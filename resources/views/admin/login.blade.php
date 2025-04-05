<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index-guest.html">Quản lý hồ bơi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Trang chủ</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Đăng Nhập</h2>
        <form action="{{ route('login') }}" method="POST" id="loginForm">
            @csrf <!-- CSRF Token để bảo vệ chống tấn công CSRF -->

            <input type="text" name="phone" placeholder="Số điện thoại" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>

            @if (Session::has('message'))
                <div class="alert alert-danger">
                    {{ Session::get('message') }}
                </div>
                @php
                    Session::forget('message');
                @endphp
            @endif

            <button type="submit">Đăng Nhập</button>
        </form>

        <br>
        <div class="switch-form">
            Chưa có tài khoản? <a href="{{route('register.form')}}">Đăng ký</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-3">
        <p>&copy; 2025 Quản lý hồ bơi. Tất cả các quyền được bảo lưu.</p>
    </footer>
</body>
</html>
