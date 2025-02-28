<!DOCTYPE html>
<html lang="en">
  <head>
   @include('head')
  </head>
  <body>
    <header >
     @include('header')
    </header>
    <main class="main-content">
      <section class="left-panel">
        <h3>Chọn điểm đo</h3>
        <select id="location-select">
          <!-- Options sẽ được thêm ở đây -->
        </select>

        <h4>Chỉ số Chất lượng không khí ngày 05/01/2025</h4>
        <div class="aqi-box">
          <div class="aqi-header">
            <span class="aqi-value">AQI</span>
            <span class="aqi-number">110</span>
          </div>
          <p class="status">Kém</p>
          <div class="details">
            <div>
              <span>Độ ẩm</span>
              <p>57.5%</p>
            </div>
            <div>
              <span>Nhiệt độ</span>
              <p>18.7°C</p>
            </div>
          </div>
        </div>
        <p>
          👨‍👩‍👧‍👦 Nhóm nhạy cảm có thể bị ảnh hưởng tới sức khỏe, hạn chế hoạt động
          ngoài trời.
        </p>
        <p>
          💡 Nhóm người bình thường: Nên cân nhắc giảm các hoạt động ngoài trời
          nếu có triệu chứng bất thường.
        </p>
        <button class="primary-button">Nồng độ</button>
        <button class="secondary-button">AQI</button>
      </section>

      <section class="right-panel">
        <div class="map-container">
          <h4>Bản đồ chất lượng không khí tại Hà Nội</h4>
          <!-- Bản đồ sẽ được hiển thị ở đây -->
          <div id="map" class="map"></div>
        </div>
      </section>
    </main>
    <div class="container-chart-table">
          
      <div class="charts-container">
        <h3>Biểu đồ chất lượng không khí</h3>
        <div class="chart-box">
          <canvas id="aqiChart"></canvas>
        </div>
        <div class="chart-box">
          <canvas id="so2Chart"></canvas>
        </div>
        <div class="chart-box">
          <canvas id="coChart"></canvas>
        </div>
        <div class="chart-box">
          <canvas id="no2Chart"></canvas>
        </div>
      </div>
      <div class="container">
        <table>
          <thead>
            <tr>
              <th>STT</th>
              <th>Thông số</th>
              <th>Trung bình 1 giờ</th>
              <th>Trung bình 8 giờ</th>
              <th>Trung bình 24 giờ</th>
              <th>Trung bình 1 năm</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>SO2</td>
              <td>350</td>
              <td>-</td>
              <td>125</td>
              <td>50</td>
            </tr>
            <tr>
              <td>2</td>
              <td>CO</td>
              <td>30.000</td>
              <td>10.000</td>
              <td>-</td>
              <td>-</td>
            </tr>
            <tr>
              <td>3</td>
              <td>NO2</td>
              <td>200</td>
              <td>-</td>
              <td>100</td>
              <td>40</td>
            </tr>
            <tr>
              <td>4</td>
              <td>O3</td>
              <td>200</td>
              <td>120</td>
              <td>-</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Tổng bụi lơ lửng (TSP)</td>
              <td>300</td>
              <td>-</td>
              <td>200</td>
              <td>100</td>
            </tr>
            <tr>
              <td>6</td>
              <td>Bụi PM10</td>
              <td>-</td>
              <td>-</td>
              <td>100</td>
              <td>50</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Bụi PM2.5</td>
              <td>-</td>
              <td>-</td>
              <td>50</td>
              <td>45(*)</td>
            </tr>
          </tbody>
        </table>
        <p><strong>Ghi chú:</strong></p>
        <ul>
          <li>Dấu (-) là không quy định</li>
          <li>(*): Giá trị nồng độ áp dụng từ ngày 01 tháng 01 năm 2026</li>
        </ul>
      </div>

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="{{asset('script.js')}}"></script>
    <!-- Link tới file script.js -->
  </body>
</html>
