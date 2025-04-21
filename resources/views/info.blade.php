@extends('main')
@section('content')

    <div class="container">
      
        <div class="news-container">
            <div class="news-list">
                <div class="news-item">
                    <img src="{{asset('images/ảnh nhà khoa học  nghiên cứu nước ở trên suối.jpg')}}" alt="News Image">
                    <div class="news-content">
                       <a href="{{ route ('detailinfo')}}"> <h3>Dự báo thời tiết ngày 7/7/2023: Nền nhiệt tại Hà Nội vượt ngưỡng 39 độ C</h3></a>
                        <p class="date">07/07/2023</p>
                        <p>Trung tâm Dự báo khí tượng thủy văn Quốc gia vừa đưa ra thông tin dự báo thời tiết...</p>
                    </div>
                </div>
                <div class="news-item">
                    <img src="https://vcdn1-vnexpress.vnecdn.net/2025/03/20/P-a-1-1742481900-9522-1742482124.png?w=680&h=0&q=100&dpr=1&fit=crop&s=1315EzF68O0e4Jwz6JmK2A" alt="News Image">
                    <div class="news-content">
                       <a href="{{ route ('infosonghong')}}"> <h3>34
                        Nghiên cứu đưa nước sông Hồng về sông Tô Lịch theo đường Võ Chí Công</h3></a>
                        <p class="date">09/05/2025</p>
                        <p>UBND TP Hà Nội giao các đơn vị nghiên cứu phương án bổ sung nước từ sông Hồng vào sông Tô Lịch theo trục đường Võ Chí Công, hoàn thành...</p>
                    </div>
                </div>
                <div class="news-item">
                    <img src="https://mtcs.1cdn.vn/2024/12/18/vesinhsongtolich.jpg" alt="News Image">
                    <div class="news-content">
                       <a href="{{ route ('inforba')}}"> <h3>34
                        Hà Nội sẽ cập nhật tình trạng vệ sinh sông hồ hằng tuần trên bảng tin “Dòng sông hôm nay"</h3></a>
                        <p class="date">09/05/2025</p>
                        <p>Mới đây, UBND TP Hà Nội đã ban hành Kế hoạch số 359/KH-UBND về thực hiện phong trào thi đua Sáng - Xanh - Sạch - Đẹp kêu gọi toàn thể công dân, cơ quan,...</p>
                    </div>
                </div>
            </div>
            <div class="news-sidebar">
                <h3>Tin tức mới cập nhật</h3>
                <ul>
                    <li><a href="#">Dự báo thời tiết ngày 7/7/2023...</a></li>
                    <li><a href="#">Dự báo thời tiết ngày 5/7/2023...</a></li>
                    <li><a href="#">Dự báo thời tiết ngày 4/7/2023...</a></li>
                    <li><a href="#">Thời tiết 10 ngày đầu tháng 7/2023...</a></li>
                </ul>
            </div>
        </div>
    </div>
 @endsection