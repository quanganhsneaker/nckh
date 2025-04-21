@extends('main')
@section('content')

    <div class="container">
 
        <div class="news-container">
            <div class="news-list">
                <div class="news-item">
                    <img src="{{asset('images/công thức tính ph.jpg')}}" alt="News Image">
                    <div class="news-content">
                     <a href="{{route('chitietthuvien')}}">  <h3>Phương pháp tính toán PH </h3></a> 
                        <p class="date">07/07/2023</p>
                        <p>   Chỉ số chất lượng PH đang được tính theo hướng dẫn tại Quyết định 1459/QĐ-TCMT ngày 12/11/2019 của Tổng cục M</p>
                    </div>
                </div>
            
            </div>
           
        </div>
    </div>
 @endsection