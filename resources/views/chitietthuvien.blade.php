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
        .aqi-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .aqi-table th, .aqi-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .aqi-table th {
            background-color: #f2f2f2;
        }
        .good { background-color: #00e400; }
        .moderate { background-color: #ffff00; }
        .unhealthy-sensitive { background-color: #ff7e00; }
        .unhealthy { background-color: #ff0000; }
        .very-unhealthy { background-color: #8f3f97; }
        .hazardous { background-color: #7e0023; color: white; }
    </style>
</head>
<body>
    @include('header')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>Dự báo thời tiết ngày 7/7/2023</h2>
                <img src="{{asset('images/bảng nồng độ ph.jpg')}}" class="img-fluid" alt="Dự báo thời tiết">
                <img src="{{asset('images/quỳ tím.jpg')}}" class="img-fluid" alt="Dự báo thời tiết">
                <img src="{{asset('images/bảng nồng độ ph.jpg')}}" class="img-fluid" alt="Dự báo thời tiết">
                <p><strong>Khu vực Hà Nội:</strong> Có mây, chiều tối và đêm có mưa rào và dông vài nơi. Ngày nắng nóng gay gắt, có nơi đặc biệt gay gắt. Gió nam cấp 2-3. Trong mưa dông có khả năng xảy ra lốc, sét và gió giật mạnh.</p>
                <p><strong>Nhiệt độ thấp nhất:</strong> 28-30°C</p>
                <p><strong>Nhiệt độ cao nhất:</strong> 37-39°C</p>
                
                <h3>Chỉ số chất lượng không khí (AQI)</h3>
                <table class="aqi-table">
                    <tr>
                        <th>Giá trị AQI</th>
                        <th>Chất lượng không khí</th>
                        <th>Ảnh hưởng tới sức khỏe</th>
                    </tr>
                    <tr class="good">
                        <td>0-50</td>
                        <td>TỐT</td>
                        <td>Chất lượng không khí tốt, không ảnh hưởng tới sức khỏe.</td>
                    </tr>
                    <tr class="moderate">
                        <td>51-100</td>
                        <td>TRUNG BÌNH</td>
                        <td>Chất lượng không khí ở mức chấp nhận được, nhưng có thể ảnh hưởng đến nhóm nhạy cảm.</td>
                    </tr>
                    <tr class="unhealthy-sensitive">
                        <td>101-150</td>
                        <td>KÉM</td>
                        <td>Nhóm nhạy cảm có thể bị ảnh hưởng, người bình thường ít chịu tác động.</td>
                    </tr>
                    <tr class="unhealthy">
                        <td>151-200</td>
                        <td>XẤU</td>
                        <td>Mọi người có thể bắt đầu bị ảnh hưởng sức khỏe, nhóm nhạy cảm chịu tác động nghiêm trọng hơn.</td>
                    </tr>
                    <tr class="very-unhealthy">
                        <td>201-300</td>
                        <td>RẤT XẤU</td>
                        <td>Cảnh báo sức khỏe: Mọi người có thể bị ảnh hưởng nhiều hơn.</td>
                    </tr>
                    <tr class="hazardous">
                        <td>301+</td>
                        <td>NGUY HẠI</td>
                        <td>Mọi người có thể bị ảnh hưởng nghiêm trọng tới sức khỏe.</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4">
                <div class="news-sidebar">
                    <h4>Tin liên quan</h4>
                    <div class="news-item"><a href="#">Dự báo thời tiết ngày 5/7/2023: Hà Nội mưa rào về đêm, ngày nắng nóng</a></div>
                    <div class="news-item"><a href="#">Dự báo thời tiết ngày 4/7/2023: Hà Nội nắng nóng ban ngày, chiều tối mưa dông</a></div>
                    <div class="news-item"><a href="#">Thời tiết 10 ngày đầu tháng 7/2023 tại Hà Nội và cả nước sẽ ra sao?</a></div>
                    <div class="news-item"><a href="#">Dự báo thời tiết ngày 29/6/2023: Hà Nội ngày nắng nóng, chiều tối mưa rào</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
