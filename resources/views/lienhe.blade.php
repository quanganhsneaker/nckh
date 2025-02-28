@extends('main' )
@section('content')
<div class="container">
    <h1>Liên hệ</h1>
    <div class="contact-section">
        <div class="contact-info">
            <img src="{{asset('images/logo.png')}}" alt="Logo" class="logo">
            <p><strong>Họ tên:</strong> Hà Minh Quang Anh</p>
            <p><strong>Số điện thoại:</strong> 0916415093</p>
            <p><strong>Chức vụ:</strong> Phó phòng Phụ trách Phòng Kế Hoạch Tài Chính.</p>
            <p><strong>Địa chỉ:</strong> Trung tâm Kỹ Thuật Tài Nguyên và Môi trường Hà Nội.</p>
            <hr>
            <p><strong>Họ tên:</strong> Nguyễn Thị Diệu</p>
            <p><strong>Số điện thoại:</strong> 098 4607161</p>
            <p><strong>Chức vụ:</strong> Tổ trưởng tổ Quan trắc môi trường tự động.</p>
            <p><strong>Địa chỉ:</strong> Trung tâm Kỹ Thuật Tài Nguyên và Môi trường Hà Nội.</p>
            <hr>
            <p><strong>Email:</strong> trungtamktnmt.hanoi@gmail.com</p>
        </div>
        <div class="contact-form">
            <h2>Liên hệ với chúng tôi</h2>
            <form>
                <label for="name">Họ tên</label>
                <input type="text" id="name" name="name" required>

                <label for="phone">Số điện thoại</label>
                <input type="text" id="phone" name="phone">

                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Nội dung</label>
                <textarea id="message" name="message" rows="4"></textarea>

                <button type="submit">Gửi tin</button>
            </form>
        </div>
    </div>
</div>

@endsection