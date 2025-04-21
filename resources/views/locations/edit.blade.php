
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa địa điểm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
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
    
</style>
<body>
    <div class="sidebar">
        <h4 class="text-center">Quản lý Nước Sạch</h4>
       
       
        <a href="{{ route (name: 'admin') }}">Trang chủ</a>
            <a href="{{ route ('messages') }}">Liên hệ</a>
            <a href="{{ route('locations.index') }}">Quản lý điểm</a>

            
    </div>
        
    <div class="container mt-4">
        <h2>Sửa địa điểm</h2>
        <form method="POST" action="{{ route('locations.update', $location->id) }}">
            @csrf
            @method('PUT')
    
            @include('locations.form')
    
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('locations.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
    

     
    
    
</body>
</html>
