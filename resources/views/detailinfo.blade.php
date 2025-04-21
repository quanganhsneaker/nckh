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
    </style>
</head>
<body>
    @include('header')
     
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>Dự báo thời tiết ngày 7/7/2025</h2>
                <img src="https://static.kinhtedothi.vn/w960/images/upload/2023/07/06/du-bao-thoi-tiet-ngay-7-thang-7-nam-2023.jpg" class="img-fluid" alt="Dự báo thời tiết">
                <p><strong>Khu vực Hà Nội:</strong> Có mây, chiều tối và đêm có mưa rào và dông vài nơi. Ngày nắng nóng gay gắt, có nơi đặc biệt gay gắt. Gió nam cấp 2-3. Trong mưa dông có khả năng xảy ra lốc, sét và gió giật mạnh.</p>
                <p><strong>Nhiệt độ thấp nhất:</strong> 28-30°C</p>
                <p><strong>Nhiệt độ cao nhất:</strong> 37-39°C</p>
                <p>Phía Tây Bắc Bộ: Có mây, chiều tối và đêm có mưa rào rải rác và có nơi có dông; ngày nắng nóng, có nơi nắng nóng gay gắt; riêng Hòa Bình có nắng nóng gay gắt, có nơi đặc biệt gay gắt. Gió nhẹ. Trong mưa dông có khả năng xảy ra lốc, sét và gió giật mạnh. Nhiệt độ thấp nhất từ : 26-29 độ, có nơi dưới 25 độ. Nhiệt độ cao nhất từ : 34-37 độ, có nơi trên 38 độ; riêng Hòa Bình 37-39 độ.</p>
                <p>Phía Đông Bắc Bộ: Có mây, chiều tối và đêm có mưa rào và dông vài nơi, vùng núi có mưa rào rải rác và có nơi có dông, ngày nắng nóng, có nơi nắng nóng gay gắt, riêng khu vực đồng bằng có nắng nóng và nắng nóng gay gắt, có nơi đặc biệt gay gắt. Gió nam cấp 2-3. Trong mưa dông có khả năng xảy ra lốc, sét và gió giật mạnh. Nhiệt độ thấp nhất từ : 27-30 độ, vùng núi có nơi dưới 27 độ. Nhiệt độ cao nhất từ : 34-37 độ, có nơi trên 38 độ; riêng khu vực đồng bằng 36-39 độ, có nơi trên 39 độ.</p>
                <p>Khu vực Thanh Hóa - Thừa Thiên Huế: Có mây, chiều tối và đêm có mưa rào và dông vài nơi; ngày nắng nóng và nắng nóng gay gắt, có nơi đặc biệt gay gắt. Gió tây nam cấp 2-3. Trong mưa dông có khả năng xảy ra lốc, sét và gió giật mạnh. Nhiệt độ thấp nhất từ : 27-30 độ. Nhiệt độ cao nhất từ : 36-39 độ, có nơi trên 39 độ.</p>
                <p>Khu vực Đà Nẵng đến Bình Thuận: Có mây, chiều tối và đêm có mưa rào và dông vài nơi; ngày nắng, có nơi nắng nóng, riêng phía Bắc có nắng nóng và nắng nóng gay gắt. Gió tây nam cấp 2-3. Trong mưa dông có khả năng xảy ra lốc, sét và gió giật mạnh. Nhiệt độ thấp nhất từ : 25-28 độ. Nhiệt độ cao nhất từ : Phía Bắc 35-38 độ; phía Nam 32-35 độ.</p>
                <p> Khu vực Tây Nguyên: Có mây, có mưa rào và dông vài nơi; riêng chiều tối và tối có mưa rào và rải rác có dông, cục bộ có mưa vừa, mưa to. Gió tây nam cấp 2-3. Trong mưa dông có khả năng xảy ra lốc, sét và gió giật mạnh. Nhiệt độ thấp nhất từ : 21-24 độ. Nhiệt độ cao nhất từ : 30-33 độ, có nơi trên 33 độ.</p>
                <p>Nam Bộ: Có mây, có mưa rào và dông vài nơi; riêng chiều tối và tối có mưa rào và rải rác có dông, cục bộ có mưa vừa, mưa to. Gió tây nam cấp 2-3. Trong mưa dông có khả năng xảy ra lốc, sét và gió giật mạnh. Nhiệt độ thấp nhất từ : 24-27 độ. Nhiệt độ cao nhất từ : 31-34 độ, có nơi trên 34 độ.</p>
            </div>
            <div class="col-md-4">
                <div class="news-sidebar">
                    <h4>Tin liên quan</h4>
                    <div class="news-item"><a href="#">Dự báo thời tiết ngày 5/7/2025: Hà Nội mưa rào về đêm, ngày nắng nóng</a></div>
                    <div class="news-item"><a href="#">Dự báo thời tiết ngày 4/7/2025: Hà Nội nắng nóng ban ngày, chiều tối mưa dông</a></div>
                    <div class="news-item"><a href="#">Thời tiết 10 ngày đầu tháng 7/2025 tại Hà Nội và cả nước sẽ ra sao?</a></div>
                    <div class="news-item"><a href="#">Dự báo thời tiết ngày 29/6/2025: Hà Nội ngày nắng nóng, chiều tối mưa rào</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
