<div class="header">
    <div class="logo">
        <img src="{{asset('images/logo.png')}}" alt="Logo" class="logo-img" />
        <div class="title">
          <h1>CỔNG THÔNG TIN QUAN TRẮC</h1>
          <h2>TÀI NGUYÊN VÀ MÔI TRƯỜNG</h2>
        </div>
      </div>
      <nav class="nav">
        <a href="{{ route ('index')}}">Trang chủ</a>
        <a href="{{ route ('info')}}">Tin tức</a>
        <a href="{{ route ('thuvien')}}">Thư viện</a>
        <a href="{{ route ('lienhe')}}">Liên hệ</a>
        <a href="{{ route ('lienket')}}">Liên kết</a>
        <a href="{{ route (name: 'bieudo')}}">Biểu đồ</a>
      </nav>
      <div class="search-container">
        <input type="text" id="search-input" placeholder="Tìm kiếm" />
        <button id="search-button">🔍</button>
      </div>
      
</div>