@extends('main')
@section('content')

    <div class="container">
        <h1 class="title">Tin tức</h1>
        <div class="news-container">
            <div class="news-list">
                <div class="news-item">
                    <img src="{{asset('images/quanganh.jpg')}}" alt="News Image">
                    <div class="news-content">
                        <h3>Dự báo thời tiết ngày 7/7/2023: Nền nhiệt tại Hà Nội vượt ngưỡng 39 độ C</h3>
                        <p class="date">07/07/2023</p>
                        <p>Trung tâm Dự báo khí tượng thủy văn Quốc gia vừa đưa ra thông tin dự báo thời tiết...</p>
                    </div>
                </div>
                <div class="news-item">
                    <img src="{{asset('images/quanganh.jpg')}}" alt="quanganh">
                    <div class="news-content">
                        <h3>Dự báo thời tiết ngày 5/7/2023: Hà Nội mưa rào</h3>
                        <p class="date">05/07/2023</p>
                        <p>Trung tâm Dự báo khí tượng thủy văn Quốc gia vừa đưa ra thông tin dự báo thời tiết...</p>
                    </div>
                </div>
                <div class="news-item">
                    <img src="{{asset('images/quanganh.jpg')}}" alt="News Image">
                    <div class="news-content">
                        <h3>Dự báo thời tiết ngày 4/7/2023: Hà Nội nắng nóng</h3>
                        <p class="date">04/07/2023</p>
                        <p>Trung tâm Dự báo khí tượng thủy văn Quốc gia vừa đưa ra thông tin dự báo thời tiết...</p>
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