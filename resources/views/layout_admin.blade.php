<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Quản Lý Hồ Bơi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>
<body>
  <!-- Thanh điều hướng -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="{{route('dashboard')}}">Quản Lý Hồ Bơi Thành Phố</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="{{route('dashboard')}}">Trang Chủ</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('pools.index')}}">Quản Lý Hồ Bơi</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('dich-vu.index')}}">Quản Lý Dịch Vụ</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('services.index')}}">Quản Lý Dịch Vụ Của Hồ Bơi</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('events.index')}}">Quản Lý Sự Kiện</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('facilities.index')}}">Quản Lý Tiện Ích</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('registrations.index')}}">Quản Lý Phiếu Đăng Ký</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('users.index')}}">Quản Lý Thông Tin Khách Hàng</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">Đánh Giá</a></li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/admin.jpg" alt="Admin" class="rounded-circle" style="width: 30px; height: 30px; margin-right: 8px;">
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
            <li><a class="dropdown-item" href="profile.html">Hồ Sơ</a></li>
            <li><a class="dropdown-item text-danger" href="{{route('login')}}">Đăng Xuất</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container mt-5 pt-5">
    @yield('content')
   </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
