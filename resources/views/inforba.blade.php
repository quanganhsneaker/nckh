
<!DOCTYPE html>
<html lang="vi">
<head>
    @include('head')
    <style>
        .news-sidebar {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }
        .news-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .news-item:last-child {
            border-bottom: none;
        }
        h1, p {
            text-align: justify;
        }
    </style>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
    @include('header')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Hà Nội sẽ cập nhật tình trạng vệ sinh sông hồ hằng tuần trên bảng tin “Dòng sông hôm nay”</h1>
                <img src="https://mtcs.1cdn.vn/2024/12/18/vesinhsongtolich.jpg" class="img-fluid" alt="Vệ sinh sông hồ">
                <p><strong>Hoàng Thơ • 18/12/2024 14:00</strong></p>
                <p>Nhằm hồi sinh các dòng sông, Hà Nội sẽ tổ chức các chiến dịch làm sạch và cải tạo cảnh quan quanh các con sông, hồ. Trong đó, bảng tin “Dòng sông hôm nay” sẽ được công khai cập nhật tình trạng vệ sinh hằng tuần.</p>
                <p>Mới đây, UBND TP Hà Nội đã ban hành Kế hoạch số 359/KH-UBND về phong trào thi đua Sáng - Xanh - Sạch - Đẹp kêu gọi toàn thể công dân, cơ quan, tổ chức và doanh nghiệp tham gia bảo vệ môi trường.</p>
                <h2>Các mục tiêu cụ thể của phong trào</h2>
                <ul>
                    <li><strong>Chung tay quản lý rác thải:</strong> Khuyến khích phân loại rác ngay từ nguồn.</li>
                    <li><strong>Bảo vệ nguồn nước và không khí:</strong> Đảm bảo môi trường sống trong lành.</li>
                    <li><strong>Bảo tồn và phát triển cảnh quan đô thị:</strong> Xây dựng không gian xanh.</li>
                </ul>
                <h2>Hành động thiết thực</h2>
                <p>Thành phố sẽ triển khai chương trình "Cuối tuần xanh", tổ chức hoạt động dọn dẹp rác thải, cải tạo cảnh quan, và lắp đặt hệ thống cảm biến đo chất lượng nước.</p>
                <p>Các chiến dịch như "Ven hồ không rác", "Ngày hội quanh hồ" sẽ giúp nâng cao ý thức cộng đồng.</p>
            </div>
            <div class="col-md-4">
                <div class="news-sidebar">
                    <h4>Tin liên quan</h4>
                    <div class="news-item"><a href="#">Hà Nội triển khai chương trình cải tạo sông hồ</a></div>
                    <div class="news-item"><a href="#">Chiến dịch "Cuối tuần xanh" thu hút đông đảo người dân</a></div>
                    <div class="news-item"><a href="#">Các giải pháp xử lý ô nhiễm nước tại Hà Nội</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

      <!-- Biểu đồ DO -->
  <canvas id="mien1" width="1100" height="300"></canvas>

  <!-- Nhúng file JS sau cùng -->
  <script src="{{ asset('script.js') }}"></script>
  <script src="{{ asset('chart.js') }}"></script>
</body>
</html>
