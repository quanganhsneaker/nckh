

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm địa điểm mới</title>
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
        <title>Danh sách địa điểm</title>
        <a href="{{ route('locations.create') }}" class="btn btn-success mb-3">Thêm mới</a>
    
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Tên</th>
                <th>Vĩ độ</th>
                <th>Kinh độ</th>
                <th>pH</th>
                <th>DO</th>
                <th>TSS</th>
                <th>WQI</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($locations as $location)
                <tr>
                    <td>{{ $location->name }}</td>
                    <td>{{ $location->lat }}</td>
                    <td>{{ $location->lon }}</td>
                    <td>{{ $location->pH }}</td>
                    <td>{{ $location->DO }}</td>
                    <td>{{ $location->TSS }}</td>
                    <td>{{ $location->WQI }}</td>
                    <td>{{ $location->status }}</td>
                    <td>
                        <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Xoá địa điểm này?')">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    

     
    
    
</body>
</html>
