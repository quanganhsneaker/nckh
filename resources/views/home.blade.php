<!DOCTYPE html>
<html lang="en">
<head>
  @include('head')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
  <header>@include('header')</header>
  <div class="co">
    <main class="main-content">
      <section class="left-panel">
        <h3>Chọn điểm đo</h3>
        <select id="location-select" onchange="selectDistrict()">
          <option value="">Chọn sông,hồ ...</option>
        </select>

        <h4>Chỉ số Chất lượng nước mặt</h4>
        <div class="wqi-box">
          <div class="wqi-header">
            <span class="wqi-value">PH</span>
            <span class="wqi-number">---</span>
          </div>
          <p class="status">---</p>
          <div class="details">
            <div>
              <span>DO(mg/L)</span>
              <p>---</p>
            </div>
            <div>
              <span>WQI</span>
              <p>---</p>
            </div>
          </div>
        </div>

        <p>Nhóm nhạy cảm có thể bị ảnh hưởng tới sức khỏe, hạn chế sử dụng.</p>
        <p>Nhóm người bình thường: Nên cân nhắc giảm các hoạt động ngoài trời nếu có triệu chứng bất thường.</p>
        <button class="primary-button">PH</button>
        <button class="secondary-button">TSS</button>
      </section>

      <section class="right-panel">
        <div class="map-container">
          <h4>Bản đồ chất lượng nước mặt tại Hà Nội</h4>
          <div id="map" class="map"></div>
        </div>
      </section>
    </main>

    <div class="body">
      <img style="width: 715px" src="{{asset('images/công thức tính ph.jpg')}} " alt="">
      <table>
        <thead>
          <tr>
            <th>Tên sông</th>
            <th>Tên điểm quan trắc</th>
            <th>pH</th>
            <th>DO (mg/L)</th>
            <th>TSS (mg/L)</th>
            <th>COD (mg/L)</th>
            <th>BOD₅ (mg/L)</th>
            <th>TN (mg/L)</th>
            <th>TP (mg/L)</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Sông Tô Lịch</td><td>Nghĩa Đô</td><td>7,43</td><td class="low">1,3</td><td class="normal">24</td><td class="high">164</td><td class="high">85</td><td class="high">70,8</td><td class="high">4,040</td></tr>
          <tr><td>Sông Tô Lịch</td><td>Cầu Mới</td><td>7,43</td><td class="low">1,1</td><td class="normal">29</td><td class="high">129</td><td class="high">56</td><td class="high">72,5</td><td class="high">4,120</td></tr>
          <tr><td>Sông Tô Lịch</td><td>Phương Liệt</td><td>7,68</td><td class="medium">2,5</td><td class="normal">32</td><td class="high">119</td><td class="high">52</td><td class="high">70,6</td><td class="high">3,760</td></tr>
          <tr><td>Sông Kim Ngưu</td><td>Tựu Liệt</td><td>7,21</td><td class="medium">2,2</td><td class="normal">29</td><td class="high">132</td><td class="high">54</td><td class="high">68,9</td><td class="high">4,000</td></tr>
          <tr><td>Sông Lừ</td><td>Định Công</td><td>7,43</td><td class="high-alert">3,1</td><td class="normal">27</td><td class="high">116</td><td class="high">55</td><td class="high">74,5</td><td class="high">3,830</td></tr>
          <tr><td>Sông Sét</td><td>Cầu Sét</td><td>7,53</td><td class="low">1,5</td><td class="normal">28</td><td class="high">154</td><td class="high">69</td><td class="high">74,5</td><td class="high">4,000</td></tr>
        </tbody>
      </table>
    </div>

  </div>

  <!-- Biểu đồ DO -->
  <canvas id="mien1" width="1100" height="300"></canvas>

  <!-- Nhúng file JS sau cùng -->
  <script src="{{ asset('script.js') }}"></script>
  <script src="{{ asset('chart.js') }}"></script>
  <div class="sidebar">
    <h4>Tin tức liên quan</h4>
    <ul>
      <li><a href="#">Hà Nội triển khai chương trình cải tạo sông hồ</a></li>
      <li><a href="#">Chiến dịch "Cuối tuần xanh" thu hút đông đảo người dân</a></li>
      <li><a href="#">Các giải pháp xử lý ô nhiễm nước tại Hà Nội</a></li>
    </ul>
  </div>
</body>
</html>
