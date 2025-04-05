<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Thêm jQuery -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index-guest.html">Quản lý hồ bơi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index-guest.html">Trang chủ</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center">Đăng Ký</h2>
        <form id="registerForm" action="{{ route('register') }}" method="POST">
            @csrf <!-- CSRF Token để bảo vệ chống tấn công CSRF -->
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Họ và Tên" required>
            </div>
            <div class="mb-3">
                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu (tối thiểu 6 ký tự)"
                    required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Đăng Ký</button>
        </form>
        <br>
        <div class="text-center">
            Đã có tài khoản? <a href="login.html">Đăng nhập</a>
        </div>
    </div>

    <footer class="bg-primary text-white text-center py-3 mt-4">
        <p>&copy; 2025 Quản lý hồ bơi. Tất cả các quyền được bảo lưu.</p>
    </footer>
</body>

</html>
