// Khởi tạo bản đồ, thiết lập vị trí trung tâm và zoom
var map = L.map("map").setView([21.0285, 105.8542], 12); // Tọa độ trung tâm Hà Nội

// Thêm lớp bản đồ OpenStreetMap
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

// Danh sách các quận Hà Nội
var districts = [
  { name: "Ba Đình", lat: 21.0278, lon: 105.8342 },
  { name: "Hoàn Kiếm", lat: 21.0285, lon: 105.8542 },
  { name: "Đống Đa", lat: 21.0083, lon: 105.8345 },
  { name: "Thanh Xuân", lat: 21.004, lon: 105.832 },
  { name: "Cầu Giấy", lat: 21.0273, lon: 105.7919 },
  { name: "Hoàng Mai", lat: 20.988, lon: 105.8697 },
  { name: "Hai Bà Trưng", lat: 21.0037, lon: 105.852 },
  { name: "Tây Hồ", lat: 21.0857, lon: 105.8544 },
  { name: "Long Biên", lat: 21.0339, lon: 105.8832 },
  { name: "Từ Liêm", lat: 21.0484, lon: 105.8019 },
  { name: "Hà Đông", lat: 20.9767, lon: 105.7346 },
  { name: "Thanh Trì", lat: 20.9656, lon: 105.8666 },
  { name: "Gia Lâm", lat: 21.0333, lon: 105.9754 },
];

// Thêm marker cho các quận Hà Nội
districts.forEach(function (district) {
  var marker = L.marker([district.lat, district.lon])
    .addTo(map)
    .bindPopup(district.name);

  // Hiệu ứng hover trên marker (di chuột vào sẽ thay đổi màu sắc)
  marker.on("mouseover", function () {
    this.openPopup();
    this.setIcon(
      L.icon({
        iconUrl:
          "https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon-2x.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
      })
    );
  });

  marker.on("mouseout", function () {
    this.closePopup();
    this.setIcon(
      L.icon({
        iconUrl:
          "https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
      })
    );
  });
});

// Thiết lập giới hạn vùng bản đồ
var bounds = [
  [20.9, 105.7], // Góc dưới trái
  [21.1, 106.0], // Góc trên phải
];
map.setMaxBounds(bounds);

// Ngừng thu phóng ra ngoài các quận Hà Nội
map.on("zoomend", function () {
  if (map.getBounds().getSouthWest().lat < 20.9) {
    map.setView([21.0285, 105.8542], 12); // Quay lại vị trí trung tâm Hà Nội
  }
});

// Hiệu ứng cho nút khi hover
document.querySelectorAll("button").forEach(function (button) {
  button.addEventListener("mouseover", function () {
    this.style.backgroundColor = "#4CAF50"; // Màu sắc khi hover
  });
  button.addEventListener("mouseout", function () {
    this.style.backgroundColor = ""; // Trả lại màu sắc ban đầu
  });
});
// Đường dẫn tới file JSON
const jsonUrl = "options.json";

// Lấy thẻ <select>
const selectElement = document.getElementById("location-select");

// Tải file JSON và thêm các option
fetch(jsonUrl)
  .then((response) => response.json())
  .then((data) => {
    const locations = data.locations;
    locations.forEach((location) => {
      const option = document.createElement("option");
      option.value = location.id;
      option.textContent = location.name;
      selectElement.appendChild(option);
    });
  })
  .catch((error) => console.error("Error loading JSON:", error));
//
// Dữ liệu mẫu cho các biểu đồ (bạn có thể thay thế bằng dữ liệu thật)
const data = {
  aqi: [100, 120, 110, 95, 115, 130], // AQI qua các ngày
  so2: [30, 50, 45, 60, 40, 55], // SO2 qua các ngày
  co: [25, 35, 30, 40, 28, 38], // CO qua các ngày
  no2: [50, 55, 60, 48, 52, 58], // NO2 qua các ngày
};

// Cấu hình biểu đồ AQI
const aqiChartConfig = {
  type: "line",
  data: {
    labels: ["Ngày 1", "Ngày 2", "Ngày 3", "Ngày 4", "Ngày 5", "Ngày 6"],
    datasets: [
      {
        label: "AQI",
        data: data.aqi,
        borderColor: "rgba(75, 192, 192, 1)",
        backgroundColor: "rgba(75, 192, 192, 0.2)",
        fill: true,
        tension: 0.4,
      },
    ],
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
};

// Cấu hình biểu đồ SO2
const so2ChartConfig = {
  type: "bar",
  data: {
    labels: ["Ngày 1", "Ngày 2", "Ngày 3", "Ngày 4", "Ngày 5", "Ngày 6"],
    datasets: [
      {
        label: "SO2",
        data: data.so2,
        backgroundColor: "rgba(255, 99, 132, 0.2)",
        borderColor: "rgba(255, 99, 132, 1)",
        borderWidth: 1,
      },
    ],
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
};

// Cấu hình biểu đồ CO
const coChartConfig = {
  type: "bar",
  data: {
    labels: ["Ngày 1", "Ngày 2", "Ngày 3", "Ngày 4", "Ngày 5", "Ngày 6"],
    datasets: [
      {
        label: "CO",
        data: data.co,
        backgroundColor: "rgba(153, 102, 255, 0.2)",
        borderColor: "rgba(153, 102, 255, 1)",
        borderWidth: 1,
      },
    ],
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
};

// Cấu hình biểu đồ NO2
const no2ChartConfig = {
  type: "line",
  data: {
    labels: ["Ngày 1", "Ngày 2", "Ngày 3", "Ngày 4", "Ngày 5", "Ngày 6"],
    datasets: [
      {
        label: "NO2",
        data: data.no2,
        borderColor: "rgba(255, 159, 64, 1)",
        backgroundColor: "rgba(255, 159, 64, 0.2)",
        fill: true,
        tension: 0.4,
      },
    ],
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
};

// Khởi tạo các biểu đồ
window.onload = function () {
  const aqiCtx = document.getElementById("aqiChart").getContext("2d");
  const so2Ctx = document.getElementById("so2Chart").getContext("2d");
  const coCtx = document.getElementById("coChart").getContext("2d");
  const no2Ctx = document.getElementById("no2Chart").getContext("2d");

  new Chart(aqiCtx, aqiChartConfig);
  new Chart(so2Ctx, so2ChartConfig);
  new Chart(coCtx, coChartConfig);
  new Chart(no2Ctx, no2ChartConfig);
};
