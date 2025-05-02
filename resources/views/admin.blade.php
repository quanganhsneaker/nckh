<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản lý Nước Sạch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script> 
    <link rel="stylesheet" href="{{asset('styles.css')}}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>

    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #2c3e50;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            cursor: pointer;
        }
        .sidebar a:hover {
            background: #34495e;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        .section {
            display: none;
        }
        .active {
            display: block;
        }
        .login-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ecf0f1;
        }
        .login-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
    </style>
</head>
<body>

<!-- Form đăng nhập -->
<div id="loginPage" class="login-container" style="display: none;">
    <div class="login-box">
        <h3 class="text-center">Đăng nhập</h3>
        <div class="mb-3">
            <label for="username" class="form-label">Tài khoản</label>
            <input type="text" id="username" class="form-control" placeholder="Nhập tài khoản">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
        </div>
        <button class="btn btn-primary w-100" onclick="login()">Đăng nhập</button>
    </div>
</div>

<!-- Dashboard -->
<div id="dashboard" style="display: none; width: 100%;">
    <div class="sidebar">
        <h4 class="text-center">Quản lý Nước Sạch</h4>
       
            <a href="{{ route (name: 'admin') }}">Trang chủ</a>
            <a href="{{ route ('messages') }}">Liên hệ</a> 
            <a href="{{ route ('edithome') }}">Quản lý </a> 

            <a onclick="logout()">Đăng xuất</a>
    </div>
    <div class="content">
        <nav class="navbar navbar-light bg-light mb-3">
            <span class="navbar-brand mb-0 h1">Dashboard - Chất lượng nước</span>
        </nav>
        
      
    </div>
    
</div>
<!-- Nút mở khung chat -->
<div id="chatIcon" onclick="toggleChat()">💬</div>

<!-- Khung chat -->
<div id="chatForm" style="display: none; flex-direction: column;">
  <div id="chatHeader">
    Hỗ trợ
    <span id="closeChat" onclick="toggleChat()">✖</span>
  </div>
  <div id="chatMessages"></div>
  <input type="text" id="chatInput" placeholder="Nhập tin nhắn..." onkeypress="handleChatInput(event)">
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Kiểm tra trạng thái đăng nhập từ localStorage
        if (localStorage.getItem("loggedIn") === "true") {
            // Nếu đã đăng nhập, hiển thị dashboard
            document.getElementById("loginPage").style.display = "none";
            document.getElementById("dashboard").style.display = "flex";
        } else {
            // Nếu chưa đăng nhập, hiển thị form đăng nhập
            document.getElementById("loginPage").style.display = "flex";
            document.getElementById("dashboard").style.display = "none";
        }
    });

    // Hàm hiển thị các section trong dashboard
    function showSection(sectionId) {
        document.querySelectorAll('.section').forEach(section => {
            section.classList.remove('active');
        });
        document.getElementById(sectionId).classList.add('active');
    }

    // Hàm đăng nhập
    function login() {
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Kiểm tra tài khoản và mật khẩu
        if (username === 'quanganh' && password === '9') {
            // Lưu trạng thái đăng nhập vào localStorage
            localStorage.setItem("loggedIn", "true");
            // Chuyển sang dashboard
            document.getElementById('loginPage').style.display = 'none';
            document.getElementById('dashboard').style.display = 'flex';
        } else {
            alert('Sai tài khoản hoặc mật khẩu!');
        }
    }

    // Hàm đăng xuất
    function logout() {
        // Xóa trạng thái đăng nhập trong localStorage
        localStorage.removeItem("loggedIn");
        // Tải lại trang để yêu cầu đăng nhập lại
        location.reload();
    }
</script>

<script src="chat.js"></script>
<script src="script.js"></script>
</body>
</html>
