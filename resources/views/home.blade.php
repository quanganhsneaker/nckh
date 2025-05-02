<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

   
</head>
<body>
    <header>@include('header')</header>
    <div id="main">
        <div id="sidebar">
            <h3>Chọn điểm đo</h3>
            <select id="selectPoint">
                <option value="">-- Chọn điểm --</option>
            </select>
          
            <div id="infoBox">  
              <div id="infoContent"><b>Thông tin điểm đo:</b><br>
                Chưa chọn điểm nào</div>
              <div id="chartContainer" style="background-color: white; padding: 10px; margin-top: 10px;">
                  <canvas id="chartCanvas" width="400" height="200"></canvas>
              </div>
          </div>
             
            <button id="resetZoom" class="button">Reset Zoom</button>
            <button id="toggleMap" class="button">Bật/Tắt Bản Đồ</button>
            <button id="toggleHn2Layer" class="button">Bật/Tắt Lớp Hà Nội (hn2)</button>
            <div id="legend">
                <h4>Chú thích</h4>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #ff0000;"></div>
                    <span>WQI = 0 - 20: Chất lượng kém</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #ff8000;"></div>
                    <span>WQI = 21 - 40: Chất lượng xấu</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #ffff00;"></div>
                    <span>WQI = 41 - 60: Chất lượng trung bình</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #80ff00;"></div>
                    <span>WQI = 61 - 80: Chất lượng tốt</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #00ff00;"></div>
                    <span>WQI = 81 - 100: Chất lượng rất tốt</span>
                </div>
            </div>
        </div>
        <div id="content">
            <div id="map"></div>
        </div>



</div>

  
<!-- Modal chỉnh sửa thông số -->
<div id="editModal" class="modal" style="display: none;">
  <div class="modal-content" style="
      max-width: 400px;
      margin: 10% auto;
      padding: 20px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
  ">
      <h3 style="text-align: center; margin-bottom: 20px;">Chỉnh sửa thông số nước</h3>
      <div id="editForm">
          <div style="margin-bottom: 10px;">
              <label for="editTDS">TDS:</label>
              <input type="number" id="editTDS" step="0.01" class="input-field">
          </div>
          <div style="margin-bottom: 10px;">
              <label for="editPH">PH:</label>
              <input type="number" id="editPH" step="0.01" class="input-field">
          </div>
          <div style="margin-bottom: 10px;">
              <label for="editCOD">COD:</label>
              <input type="number" id="editCOD" step="0.01" class="input-field">
          </div>
          <div style="margin-bottom: 10px;">
              <label for="editBOD">BOD:</label>
              <input type="number" id="editBOD" step="0.01" class="input-field">
          </div>
          <div style="margin-bottom: 20px;">
              <label for="editTSS">TSS:</label>
              <input type="number" id="editTSS" step="0.01" class="input-field">
          </div>
          <div style="text-align: center;">
              <button id="saveEdit" class="button" style="margin-right: 10px;">Lưu</button>
              <button id="cancelEdit" class="button">Hủy</button>
          </div>
      </div>
  </div>
</div>
<!-- Nút mở khung chat -->
<div id="chatIcon" onclick="toggleChat()">💬</div>

<!-- Khung chat -->
<div id="chatForm" style="display: none; flex-direction: column;">
  <div id="chatHeader">
    Hỗ trợ phản ánh
    <span id="closeChat" onclick="toggleChat()">✖</span>
  </div>
  <div id="chatMessages"></div>
  <div id="chatInputContainer">
    <input type="file" id="imageUpload" onchange="handleImageUpload(event)" hidden>
    <button onclick="document.getElementById('imageUpload').click()">📷</button>
    <input type="text" id="chatInput" placeholder="Nhập phản ánh..." onkeypress="handleChatInput(event)">
  </div>
</div>
    <footer>© 2025 - Đồ án Môi trường nước Hà Nội</footer>
    <script src="script.js"></script>
    <script src="chat.js"></script>

</body>
</html>