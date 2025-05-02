<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tin nhắn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
       

            
    </div>
        
    <div class="container mt-4">
        <h3 class="mb-4">Danh sách người liên hệ </h3>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Nội dung</th>
                    <th>Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?= htmlspecialchars($contact['name']) ?></td>
                    <td><?= htmlspecialchars($contact['email']) ?></td>
                    <td><?= htmlspecialchars($contact['phone']) ?></td>
                    <td><?= htmlspecialchars($contact['message']) ?></td>
                    <td><?= htmlspecialchars($contact['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    

     
    
    
</body>
</html>
