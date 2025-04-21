// Khởi tạo bản đồ
var map = L.map("map").setView([21.0285, 105.8542], 12);

// Thêm bản đồ nền OpenStreetMap
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

// Gọi API /locations từ Laravel để lấy danh sách sông/hồ
fetch('/api/locations')

    .then(response => response.json())
    .then(data => {
        if (!Array.isArray(data)) return;

        const selectElement = document.getElementById("location-select");

        data.forEach(location => {
            // Tạo option trong dropdown
            const option = document.createElement("option");
            option.value = JSON.stringify(location);
            option.textContent = location.name;
            selectElement.appendChild(option);

            // Thêm marker
            const marker = L.marker([location.lat, location.lon])
                .addTo(map)
                .bindPopup(`
                    <b>${location.name}</b><br>
                    pH: ${location.pH?.toFixed(1) ?? "N/A"}<br>
                    DO: ${location.DO?.toFixed(1) ?? "N/A"} mg/L<br>
                    TSS: ${location.TSS?.toFixed(1) ?? "N/A"} mg/L<br>
                    WQI: ${location.WQI ?? "N/A"}<br>
                    Trạng thái: <strong style="color:${
                        location.status === "Xấu"
                            ? "red"
                            : location.status === "Kém"
                            ? "orange"
                            : "green"
                    }">${location.status}</strong>
                `);

            marker.on("mouseover", function () {
                this.openPopup();
            });

            marker.on("mouseout", function () {
                this.closePopup();
            });
        });

        // Lưu danh sách location vào biến toàn cục
        window.allLocations = data;
    })
    .catch(error => {
        console.error("Lỗi khi lấy dữ liệu /locations:", error);
    });

// Hàm xử lý khi chọn 1 điểm từ dropdown
function selectDistrict() {
    const selectedValue = document.getElementById("location-select").value;
    if (selectedValue) {
        const location = JSON.parse(selectedValue);

        document.querySelector(".wqi-number").textContent = location.pH?.toFixed(1) ?? "---";
        document.querySelector(".status").textContent = location.status ?? "---";
        document.querySelector(".details div:nth-child(1) p").textContent = location.DO?.toFixed(1) + " mg/L" ?? "---";
        document.querySelector(".details div:nth-child(2) p").textContent = location.WQI ?? "---";

        // Đổi màu theo trạng thái
        let bgColor = "green";
        if (location.status === "Trung bình") bgColor = "yellow";
        else if (location.status === "Kém") bgColor = "orange";
        else if (location.status === "Xấu") bgColor = "red";

        document.querySelector(".wqi-box").style.backgroundColor = bgColor;

        map.setView([location.lat, location.lon], 14);
        L.popup()
            .setLatLng([location.lat, location.lon])
            .setContent(`
                <b>${location.name}</b><br>
                pH: ${location.pH?.toFixed(1) ?? "N/A"}<br>
                DO: ${location.DO?.toFixed(1) ?? "N/A"} mg/L<br>
                TSS: ${location.TSS?.toFixed(1) ?? "N/A"} mg/L<br>
                WQI: ${location.WQI ?? "N/A"}<br>
                Trạng thái: <strong>${location.status ?? "---"}</strong>
            `)
            .openOn(map);
    }
}

// Giới hạn bản đồ Hà Nội
var bounds = [
    [20.9, 105.7],
    [21.1, 106.0],
];
map.setMaxBounds(bounds);
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++||||
document.getElementById("search-button").addEventListener("click", performFullSearch);
document.getElementById("search-input").addEventListener("keydown", function(e) {
  if (e.key === "Enter") performFullSearch();
});

function performFullSearch() {
  const keyword = document.getElementById("search-input").value.trim().toLowerCase();
  if (!keyword) return;

  // Xóa highlight cũ
  removeHighlights();

  // Quét toàn bộ trang
  const bodyTextNodes = getTextNodes(document.body);
  let found = false;
  let firstMatch;

  bodyTextNodes.forEach(node => {
    const text = node.textContent;
    const lowerText = text.toLowerCase();

    if (lowerText.includes(keyword)) {
      found = true;

      const highlightedHTML = text.replace(new RegExp(`(${keyword})`, 'gi'), `<mark>$1</mark>`);
      const span = document.createElement("span");
      span.innerHTML = highlightedHTML;

      node.parentNode.replaceChild(span, node);

      if (!firstMatch) {
        firstMatch = span.querySelector("mark");
      }
    }
  });

  if (firstMatch) {
    firstMatch.scrollIntoView({ behavior: "smooth", block: "center" });
  } else {
    alert("Không tìm thấy kết quả.");
  }
}

function removeHighlights() {
  const marks = document.querySelectorAll("mark");
  marks.forEach(mark => {
    const parent = mark.parentNode;
    parent.replaceChild(document.createTextNode(mark.textContent), mark);
    parent.normalize(); // Gộp text node lại nếu cần
  });
}

// Trả về tất cả text nodes có thể tìm kiếm
function getTextNodes(element) {
  const nodes = [];
  const walker = document.createTreeWalker(element, NodeFilter.SHOW_TEXT, {
    acceptNode: function(node) {
      // Chỉ lấy node có chữ và không trong script/style
      if (
        node.parentNode &&
        !["SCRIPT", "STYLE", "NOSCRIPT"].includes(node.parentNode.nodeName) &&
        node.textContent.trim() !== ""
      ) {
        return NodeFilter.FILTER_ACCEPT;
      }
      return NodeFilter.FILTER_REJECT;
    }
  });

  while (walker.nextNode()) {
    nodes.push(walker.currentNode);
  }

  return nodes;
}