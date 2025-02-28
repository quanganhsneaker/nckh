@extends('main' )
@section('content')
<div class="link-container">
    <h2>Liên kết website</h2>

    <div class="link-item">
        <img src="{{asset('images/logoquochoi.jpg')}}" alt="Hà Nội">
        <div class="link-text">
            <span>Cổng Giao tiếp điện tử Thành phố Hà Nội</span>
            <a href="https://hanoi.gov.vn/">https://hanoi.gov.vn/</a>
        </div>
    </div>

    <div class="link-item">
        <img src="https://moitruongthudo.vn/uploads/1583721198_tgtpoqws.PNG" alt="Sở Tài nguyên">
        <div class="link-text">
            <span>Sở Tài nguyên & Môi trường Hà Nội</span>
            <a href="http://sotnmt.hanoi.gov.vn/">http://sotnmt.hanoi.gov.vn/</a>
        </div>
    </div>

    <div class="link-item">
        <img src="data:image/png;base64,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" alt="Chỉ số chất lượng">
        <div class="link-text">
            <span>Chỉ số chất lượng không khí TP Hà Nội (Tiếng Anh)</span>
            <a href="https://airhanoi.hanoi.gov.vn/">https://airhanoi.hanoi.gov.vn/</a>
        </div>
    </div>

    <div class="link-item">
        <img src="https://moitruongthudo.vn/uploads/1583718945_9anleqo3.png" alt="CEM">
        <div class="link-text">
            <span>Trung tâm Quan trắc môi trường Miền Bắc</span>
            <a href="http://cem.gov.vn/">http://cem.gov.vn/</a>
        </div>
    </div>

    <div class="link-item">
        <img src="https://moitruongthudo.vn/uploads/1583832122_ekxvsh6j.jpg" alt="WHO">
        <div class="link-text">
            <span>Tổ chức Y tế Thế giới</span>
            <a href="https://www.who.int/">https://www.who.int/</a>
        </div>
    </div>

    <div class="link-item">
        <img src="https://moitruongthudo.vn/uploads/1583832068_g6renwyy.png" alt="EPA">
        <div class="link-text">
            <span>Cơ quan bảo vệ môi trường Hoa Kỳ</span>
            <a href="https://www.epa.gov/">https://www.epa.gov/</a>
        </div>
    </div>

    <div class="link-item">
        <img src="https://moitruongthudo.vn/uploads/1583721585_lewyxyrp.png" alt="AirNow">
        <div class="link-text">
            <span>Hệ thống giám sát chất lượng không khí tại các đại sứ quán và lãnh sự quán Hoa Kỳ</span>
            <a href="https://airnow.gov/">https://airnow.gov/</a>
        </div>
    </div>

    <div class="link-item">
        <img src="https://moitruongthudo.vn/uploads/1583719775_ffsa3yaj.png" alt="AirParif">
        <div class="link-text">
            <span>Hệ thống mạng lưới quan trắc không khí tại Paris</span>
            <a href="https://www.airparif.asso.fr/">https://www.airparif.asso.fr/</a>
        </div>
    </div>

</div>
@endsection