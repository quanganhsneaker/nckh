// Định nghĩa giới hạn cho Hà Nội
var hanoiBounds = L.latLngBounds(
  [20.5, 105.0], // Tây Nam
  [21.5, 106.5] // Đông Bắc
);

var map = L.map("map", {
  maxBounds: hanoiBounds,
  maxBoundsViscosity: 1.0,
  minZoom: 10,
}).setView([21.0285, 105.8542], 10);

var initialView = { center: [21.0285, 105.8542], zoom: 10 };

var layers = {};
var hn2Layer; // Khai báo biến lớp bản đồ nền
var currentEditLayer = null; // Biến để lưu layer đang chỉnh sửa
let currentChart = null; // Biến để quản lý biểu đồ

// Kiểm tra trạng thái đăng nhập khi tải trang
document.addEventListener("DOMContentLoaded", function () {
  if (localStorage.getItem("loggedIn") === "true") {
      // Nếu đã đăng nhập, hiển thị dashboard
      document.getElementById("loginPage").style.display = "none";
      document.getElementById("dashboard").style.display = "flex";
  } else {
      // Nếu chưa đăng nhập, hiển thị form đăng nhập
      document.getElementById("loginPage").style.display = "flex";
      document.getElementById("dashboard").style.display = "none";
  }
});

// Hàm hiển thị các section trong dashboard
function showSection(sectionId) {
  document.querySelectorAll('.section').forEach(section => {
      section.classList.remove('active');
  });
  document.getElementById(sectionId).classList.add('active');
}

// Hàm đăng nhập
function login() {
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Kiểm tra tài khoản và mật khẩu
  if (username === 'quanganh' && password === '9') {
      // Lưu trạng thái đăng nhập vào localStorage
      localStorage.setItem("loggedIn", "true");
      // Chuyển sang dashboard
      document.getElementById('loginPage').style.display = 'none';
      document.getElementById('dashboard').style.display = 'flex';
  } else {
      alert('Sai tài khoản hoặc mật khẩu!');
  }
}

// Hàm đăng xuất
function logout() {
  // Xóa trạng thái đăng nhập trong localStorage
  localStorage.removeItem("loggedIn");
  // Tải lại trang để yêu cầu đăng nhập lại
  location.reload();
}

// Hàm tạo màu gradient từ xanh nhạt đến xanh đậm (giữ lại phòng trường hợp cần)
function getColor(value, minValue, maxValue) {
  var startColor = { r: 230, g: 240, b: 250 }; // #E6F0FA
  var endColor = { r: 0, g: 48, b: 135 }; // #003087

  var ratio = (maxValue - minValue) !== 0 ? (value - minValue) / (maxValue - minValue) : 0;
  var r = Math.round(startColor.r + (endColor.r - startColor.r) * ratio);
  var g = Math.round(startColor.g + (endColor.g - startColor.g) * ratio);
  var b = Math.round(startColor.b + (endColor.b - startColor.b) * ratio);

  return `rgb(${r}, ${g}, ${b})`;
}

// Hàm tạo màu dựa trên WQI
function getWQIColor(wqi) {
  var startColor = { r: 255, g: 0, b: 0 }; // Đỏ (WQI = 0: Chất lượng kém)
  var endColor = { r: 0, g: 255, b: 0 }; // Xanh lá (WQI = 100: Chất lượng rất tốt)

  if (wqi <= 20) {
      return `rgb(255, 0, 0)`;
  } else if (wqi <= 40) {
      return `rgb(255, 128, 0)`;
  } else if (wqi <= 60) {
      return `rgb(255, 255, 0)`;
  } else if (wqi <= 80) {
      return `rgb(128, 255, 0)`;
  } else {
      return `rgb(0, 255, 0)`;
  }
}

// Hàm tính WQI
function calculateWQI(props) {
  var tds = parseFloat(props.TDS) || 0;
  var ph = parseFloat(props.PH) || 0;
  var cod = parseFloat(props.COD) || 0;
  var bod = parseFloat(props.BOD) || 0;
  var tss = parseFloat(props.TSS) || 0;

  var qPh = 0;
  if (ph >= 6.5 && ph <= 8.5) {
      qPh = 100 - (Math.abs(ph - 7.5) / 1) * 100;
      qPh = Math.max(0, qPh);
  }

  var qCod = cod <= 10 ? 100 : cod >= 50 ? 0 : ((50 - cod) / (50 - 10)) * 100;
  var qBod = bod <= 4 ? 100 : bod >= 20 ? 0 : ((20 - bod) / (20 - 4)) * 100;
  var qTss = tss <= 20 ? 100 : tss >= 100 ? 0 : ((100 - tss) / (100 - 20)) * 100;
  var qTds = tds <= 500 ? 100 : tds >= 1500 ? 0 : ((1500 - tds) / (1500 - 500)) * 100;

  var wPh = 0.2;
  var wCod = 0.3;
  var wBod = 0.3;
  var wTss = 0.1;
  var wTds = 0.1;

  var wqi = wPh * qPh + wCod * qCod + wBod * qBod + wTss * qTss + wTds * qTds;
  return Math.round(wqi);
}

// Hàm tạo biểu đồ
function createChart(data) {
  if (currentChart) {
      currentChart.destroy(); // Xóa biểu đồ cũ
      currentChart = null;
  }

  const ctx = document.getElementById("chartCanvas").getContext("2d");
  currentChart = new Chart(ctx, {
      type: "bar",
      data: {
          labels: ["TDS", "pH", "COD", "BOD", "TSS"],
          datasets: [
              {
                  label: "Thông số nước",
                  data: [
                      data.TDS || 0,
                      data.PH || 0,
                      data.COD || 0,
                      data.BOD || 0,
                      data.TSS || 0
                  ],
                  backgroundColor: [
                      "#ff0000",
                      "#ff8000",
                      "#ffff00",
                      "#80ff00",
                      "#00ff00",
                  ],
                  borderColor: [
                      "#ff0000",
                      "#ff8000",
                      "#ffff00",
                      "#80ff00",
                      "#00ff00",
                  ],
                  borderWidth: 1,
              },
          ],
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true,
              },
          },
      },
  });
}

// Hàm hiển thị thông tin điểm đo
function showPointInfo(selectedName) {
  const infoBox = document.getElementById("infoBox");
  const infoContent = document.getElementById("infoContent");
  const chartContainer = document.getElementById("chartContainer");

  // Đặt lại các lớp
  for (let name in layers) {
      layers[name].setStyle({
          fillColor: "transparent",
          fillOpacity: 0,
      });
  }

  if (selectedName && layers[selectedName]) {
      const layer = layers[selectedName];
      const props = layer.feature.properties;
      const wqi = calculateWQI(props);

      map.fitBounds(layer.getBounds());
      layer.openPopup();

      // Tô màu vùng được chọn
      layer.setStyle({
          fillColor: getWQIColor(wqi),
          fillOpacity: 0.8,
      });

      // Cập nhật màu nền cho phần info chính
      infoBox.style.backgroundColor = getWQIColor(wqi);

      // Cập nhật thông tin văn bản
      infoContent.innerHTML = `
          <b>Địa điểm:</b> ${props.name ?? "Không rõ"}<br><br>
          <b>TDS:</b> ${props.TDS ?? "Không có dữ liệu"}<br>
          <b>pH:</b> ${props.PH ?? "Không có dữ liệu"}<br>
          <b>COD:</b> ${props.COD ?? "Không có dữ liệu"}<br>
          <b>BOD:</b> ${props.BOD ?? "Không có dữ liệu"}<br>
          <b>TSS:</b> ${props.TSS ?? "Không có dữ liệu"}<br>
          <b>WQI:</b> ${wqi}
      `;

      // Tạo biểu đồ
      createChart(props);
      document.getElementById("selectPoint").value = selectedName;
  } else {
      infoBox.style.backgroundColor = "#e0f7fa";
      document.getElementById("selectPoint").value = "";
      document.getElementById("searchPoint").value = "";

      if (selectedName) {
          infoContent.innerHTML = `<b>Thông tin điểm đo:</b><br>Không tìm thấy điểm "${selectedName}"`;
      } else {
          infoContent.innerHTML = `<b>Thông tin điểm đo:</b><br>Chưa chọn điểm nào`;
      }

      // Xóa biểu đồ nếu không có dữ liệu
      if (currentChart) {
          currentChart.destroy();
          currentChart = null;
      }
      const ctx = document.getElementById("chartCanvas").getContext("2d");
      ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
  }
}

// Thêm lớp bản đồ nền OpenStreetMap
hn2Layer = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  maxZoom: 19,
}).addTo(map);

// Load các vùng môi trường nước
fetch("naturewatervung_fixed.geojson")
  .then((res) => res.json())
  .then((data) => {
      // Áp dụng dữ liệu đã chỉnh sửa từ localStorage (nếu có)
      var editedData = localStorage.getItem("editedWaterData");
      if (editedData) {
          editedData = JSON.parse(editedData);
          data.features.forEach((feature) => {
              var name = feature.properties.name || "Unknown_" + Object.keys(layers).length;
              if (editedData[name]) {
                  Object.assign(feature.properties, editedData[name]);
              }
          });
      }

      var geojsonLayer = L.geoJSON(data, {
          style: function (feature) {
              return {
                  color: "black",
                  weight: 0.3,
                  fillColor: "transparent",
                  fillOpacity: 0,
              };
          },
          onEachFeature: function (feature, layer) {
            var props = feature.properties || {};
            var wqi = calculateWQI(props);
            var name = props.name || "Unknown_" + Object.keys(layers).length;
        
            // Kiểm tra trạng thái đăng nhập và trang hiện tại
            var isLoggedIn = localStorage.getItem("loggedIn") === "true";
            var isEditPage = window.location.pathname.includes("edithome"); // Kiểm tra trang edithome
            var editButton = (isLoggedIn && isEditPage) ? `<button class="edit-button" onclick="openEditModal('${name}')">Sửa</button>` : "";
        
            var popupContent = `
                <b>Địa điểm:</b> ${props.name ?? "Không rõ"}<br><br>
                <table border="1" cellpadding="5" cellspacing="0">
                    <tr><th>Thông số</th><th>Giá trị</th></tr>
                    <tr><td>TDS</td><td>${props.TDS ?? "Không có dữ liệu"}</td></tr>
                    <tr><td>PH</td><td>${props.PH ?? "Không có dữ liệu"}</td></tr>
                    <tr><td>COD</td><td>${props.COD ?? "Không có dữ liệu"}</td></tr>
                    <tr><td>BOD</td><td>${props.BOD ?? "Không có dữ liệu"}</td></tr>
                    <tr><td>TSS</td><td>${props.TSS ?? "Không có dữ liệu"}</td></tr>
                    <tr><td>WQI</td><td>${wqi}</td></tr>
                </table>
                ${editButton}
            `;
            layer.bindPopup(popupContent);
        
            layers[name] = layer;
        
            // Thêm sự kiện click cho lớp
            layer.on("click", function () {
                showPointInfo(name);
            });
        }
      }).addTo(map);

      var selectPoint = document.getElementById("selectPoint");
      data.features.forEach(function (feature) {
          var name = feature.properties.name || "Unknown_" + selectPoint.options.length;
          var option = document.createElement("option");
          option.value = name;
          option.textContent = name;
          selectPoint.appendChild(option);
      });
  })
  .catch((error) => console.error("Lỗi tải naturewatervung_fixed.geojson:", error));

// Hàm mở modal chỉnh sửa
function openEditModal(layerName) {
  // Chỉ cho phép mở modal nếu đã đăng nhập và ở trang edithome
  if (localStorage.getItem("loggedIn") !== "true") {
      alert("Vui lòng đăng nhập để chỉnh sửa!");
      return;
  }
  if (!window.location.pathname.includes("edithome")) {
      alert("Chỉ có thể chỉnh sửa ở trang edithome!");
      return;
  }

  currentEditLayer = layerName;
  var layer = layers[layerName];
  var props = layer.feature.properties;

  // Điền giá trị hiện tại vào form
  document.getElementById("editTDS").value = props.TDS || "";
  document.getElementById("editPH").value = props.PH || "";
  document.getElementById("editCOD").value = props.COD || "";
  document.getElementById("editBOD").value = props.BOD || "";
  document.getElementById("editTSS").value = props.TSS || "";

  // Hiển thị modal
  document.getElementById("editModal").style.display = "flex";
}

// Sự kiện lưu chỉnh sửa
document.getElementById("saveEdit").addEventListener("click", function () {
  if (!currentEditLayer || !layers[currentEditLayer]) return;

  var layer = layers[currentEditLayer];
  var props = layer.feature.properties;

  // Cập nhật giá trị từ form
  props.TDS = document.getElementById("editTDS").value || null;
  props.PH = document.getElementById("editPH").value || null;
  props.COD = document.getElementById("editCOD").value || null;
  props.BOD = document.getElementById("editBOD").value || null;
  props.TSS = document.getElementById("editTSS").value || null;

  // Lưu dữ liệu đã chỉnh sửa vào localStorage
  var editedData = localStorage.getItem("editedWaterData");
  editedData = editedData ? JSON.parse(editedData) : {};
  editedData[currentEditLayer] = {
      TDS: props.TDS,
      PH: props.PH,
      COD: props.COD,
      BOD: props.BOD,
      TSS: props.TSS,
  };
  localStorage.setItem("editedWaterData", JSON.stringify(editedData));

  // Tính lại WQI và cập nhật popup
  var wqi = calculateWQI(props);
  var isLoggedIn = localStorage.getItem("loggedIn") === "true";
  var isEditPage = window.location.pathname.includes("edithome"); // Kiểm tra trang edithome
  var editButton = (isLoggedIn && isEditPage) ? `<button onclick="openEditModal('${currentEditLayer}')">Sửa</button>` : "";
  var popupContent = `
      <b>Địa điểm:</b> ${props.name ?? "Không rõ"}<br><br>
      <table border="1" cellpadding="5" cellspacing="0">
          <tr><th>Thông số</th><th>Giá trị</th></tr>
          <tr><td>TDS</td><td>${props.TDS ?? "Không có dữ liệu"}</td></tr>
          <tr><td>PH</td><td>${props.PH ?? "Không có dữ liệu"}</td></tr>
          <tr><td>COD</td><td>${props.COD ?? "Không có dữ liệu"}</td></tr>
          <tr><td>BOD</td><td>${props.BOD ?? "Không có dữ liệu"}</td></tr>
          <tr><td>TSS</td><td>${props.TSS ?? "Không có dữ liệu"}</td></tr>
          <tr><td>WQI</td><td>${wqi}</td></tr>
      </table>
      ${editButton}
  `;
  layer.setPopupContent(popupContent);

  // Cập nhật giao diện
  showPointInfo(currentEditLayer);

  // Đóng modal
  document.getElementById("editModal").style.display = "none";
  currentEditLayer = null;
});

// Sự kiện hủy chỉnh sửa
document.getElementById("cancelEdit").addEventListener("click", function () {
  document.getElementById("editModal").style.display = "none";
  currentEditLayer = null;
});

// Sự kiện khi chọn điểm từ dropdown
document.getElementById("selectPoint").addEventListener("change", function () {
  var selectedName = this.value;
  showPointInfo(selectedName);
});

// Sự kiện khi ấn vào biểu tượng tìm kiếm
document.getElementById("searchButton").addEventListener("click", function () {
  var keyword = document.getElementById("searchPoint").value.trim().toLowerCase();
  var matchedName = null;

  if (keyword === "") {
      alert("Vui lòng nhập từ khóa tìm kiếm!");
      return;
  }

  for (var name in layers) {
      if (name.toLowerCase().includes(keyword)) {
          matchedName = name;
          break;
      }
  }

  showPointInfo(matchedName);
  if (!matchedName) {
      alert("Không tìm thấy địa điểm phù hợp!");
  }
});

// Sự kiện khi ấn Enter trong ô tìm kiếm
document.getElementById("searchPoint").addEventListener("keypress", function (e) {
  if (e.key === "Enter") {
      document.getElementById("searchButton").click();
  }
});

// Lấy đối tượng nút và phần bản đồ
const toggleMapButton = document.getElementById("toggleMap");
const mapContainer = document.getElementById("map");

// Sự kiện khi nhấn nút Bật/Tắt Bản Đồ
toggleMapButton.addEventListener("click", function () {
  if (mapContainer.style.display === "none") {
      mapContainer.style.display = "block";
      map.invalidateSize();
  } else {
      mapContainer.style.display = "none";
  }
});

// Sự kiện Bật/Tắt Bản Đồ Nền
const toggleHn2LayerButton = document.getElementById("toggleHn2Layer");
toggleHn2LayerButton.addEventListener("click", function () {
  if (map.hasLayer(hn2Layer)) {
      map.removeLayer(hn2Layer);
  } else {
      map.addLayer(hn2Layer);
  }
});

// Sự kiện Reset Zoom
document.getElementById("resetZoom").addEventListener("click", function () {
  // Reset lại bản đồ về vị trí ban đầu
  map.setView(initialView.center, initialView.zoom);
  
  // Đóng popup nếu có
  map.closePopup();
  
  // Reset lại thông tin điểm đo
  const infoBox = document.getElementById("infoBox");
  const infoContent = document.getElementById("infoContent");
  infoBox.style.backgroundColor = "#e0f7fa";
  infoContent.innerHTML = `<b>Thông tin điểm đo:</b><br>Chưa chọn điểm nào`;

  // Reset các giá trị trong các ô nhập liệu
  document.getElementById("selectPoint").value = "";
  document.getElementById("searchPoint").value = "";

  // Đặt lại tất cả các lớp về trong suốt
  for (var name in layers) {
      layers[name].setStyle({
          fillColor: "transparent",
          fillOpacity: 0,
      });
  }

  // Reset biểu đồ nếu có
  if (currentChart) {
      currentChart.destroy();
      currentChart = null;
  }
  const ctx = document.getElementById("chartCanvas").getContext("2d");
  ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
});
// ===============================================================================================================================
window.onload = renderMessages;

function toggleChat() {
  const chatForm = document.getElementById('chatForm');
  chatForm.style.display = chatForm.style.display === 'none' || chatForm.style.display === '' ? 'flex' : 'none';

  if (chatForm.style.display === 'flex') {
    renderMessages();
  }
}

function handleChatInput(event) {
  if (event.key === 'Enter') {
    const input = document.getElementById('chatInput');
    const message = input.value.trim();
    if (message) {
      const stored = JSON.parse(localStorage.getItem('chatMessages')) || [];

      const isAdmin = window.location.href.includes("admin");
      const sender = isAdmin ? "Admin" : "User";

      stored.push({ sender, text: message });
      localStorage.setItem('chatMessages', JSON.stringify(stored));

      input.value = '';
      renderMessages();
    }
  }
}

function renderMessages() {
  const chatMessages = document.getElementById('chatMessages');
  const stored = JSON.parse(localStorage.getItem('chatMessages')) || [];

  const isAdmin = window.location.href.includes("admin");
  const currentUser = isAdmin ? "Admin" : "User";

  chatMessages.innerHTML = '';
  stored.forEach(msg => {
    const isMe = msg.sender === currentUser;
    const displayName = isMe ? "Tôi" : msg.sender;
    const messageClass = isMe ? "chat-right" : "chat-left";

    chatMessages.innerHTML += `
      <div class="${messageClass}">
        <p><b>${displayName}:</b> ${msg.text}</p>
      </div>
    `;
  });

  chatMessages.scrollTop = chatMessages.scrollHeight;
}
