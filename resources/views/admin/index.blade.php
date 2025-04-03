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
    <a class="navbar-brand" href="#">Quản Lý Hồ Bơi Thành Phố</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="index.html">Trang Chủ</a></li>
        <li class="nav-item"><a class="nav-link" href="pool-management.html">Quản Lý Hồ Bơi</a></li>
        <li class="nav-item"><a class="nav-link" href="service-management.html">Quản Lý Dịch Vụ</a></li>
        <li class="nav-item"><a class="nav-link" href="service-management2.html">Quản Lý Dịch Vụ Của Hồ Bơi</a></li>
        <li class="nav-item"><a class="nav-link" href="event-management.html">Quản Lý Sự Kiện</a></li>
        <li class="nav-item"><a class="nav-link" href="facility-management.html">Quản Lý Tiện Ích</a></li>
        <li class="nav-item"><a class="nav-link" href="eventregistrations.html">Quản Lý Phiếu Đăng Ký</a></li>
        <li class="nav-item"><a class="nav-link" href="infor-customer.html">Quản Lý Thông Tin Khách Hàng</a></li>
        <li class="nav-item"><a class="nav-link" href="review-management.html">Đánh Giá</a></li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/admin.jpg" alt="Admin" class="rounded-circle" style="width: 30px; height: 30px; margin-right: 8px;">
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
            <li><a class="dropdown-item" href="profile.html">Hồ Sơ</a></li>
            <li><a class="dropdown-item text-danger" href="logout.html">Đăng Xuất</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-5 pt-5">
    <h1 class="text-center mb-5">Chào Mừng Đến Với Hệ Thống Quản Lý Hồ Bơi</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      <!-- Quản Lý Hồ Bơi -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Quản Lý Hồ Bơi</h5>
            <p class="card-text">Quản lý các hồ bơi trong thành phố, cập nhật và kiểm tra các hồ bơi hiện có.</p>
            <a href="pool.html" class="btn btn-primary">Xem Chi Tiết</a>
          </div>
        </div>
      </div>

      <!-- Quản Lý Dịch Vụ -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Quản Lý Dịch Vụ</h5>
            <p class="card-text">Quản lý các dịch vụ hồ bơi, các dịch vụ hỗ trợ người tham gia.</p>
            <a href="service-management.html" class="btn btn-primary">Xem Chi Tiết</a>
          </div>
        </div>
      </div>

      <!-- Quản Lý Dịch Vụ Của Hồ Bơi -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Quản Lý Dịch Vụ Của Hồ Bơi</h5>
            <p class="card-text">Quản lý các dịch vụ hồ bơi về giá cả, về hồ bơi đó.</p>
            <a href="service-management2.html" class="btn btn-primary">Xem Chi Tiết</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
      <!-- Quản Lý Sự Kiện -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Quản Lý Sự Kiện</h5>
            <p class="card-text">Quản lý các sự kiện tại các hồ bơi, thời gian tổ chức và các chi tiết khác.</p>
            <a href="event-management.html" class="btn btn-primary">Xem Chi Tiết</a>
          </div>
        </div>
      </div>

      <!-- Quản Lý Tiện Ích -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Quản Lý Tiện Ích</h5>
            <p class="card-text">Quản lý các tiện ích tại các hồ bơi, các tiện ích hỗ trợ người tham gia.</p>
            <a href="facility-management.html" class="btn btn-primary">Xem Chi Tiết</a>
          </div>
        </div>
      </div>

      <!-- Quản Lý Phiếu Đăng Ký -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Quản Lý Phiếu Đăng Ký</h5>
            <p class="card-text">Quản lý các phiếu đăng ký tham gia các sự kiện hoặc dịch vụ tại các hồ bơi.</p>
            <a href="eventregistrations.html" class="btn btn-primary">Xem Chi Tiết</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
      <!-- Quản Lý Thông Tin Khách Hàng -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Quản Lý Thông Tin Khách Hàng</h5>
            <p class="card-text">Xem thông tin chi tiết về khách hàng đã đăng ký tham gia các dịch vụ và sự kiện.</p>
            <a href="infor-customer.html" class="btn btn-primary">Xem Chi Tiết</a>
          </div>
        </div>
      </div>

      <!-- Đánh Giá -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Đánh Giá</h5>
            <p class="card-text">Xem đánh giá của khách hàng về các dịch vụ, hồ bơi đã tham gia.</p>
            <a href="review-management.html" class="btn btn-primary">Xem Chi Tiết</a>
          </div>
        </div>
      </div>

      <!-- Thống kê -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Thống kê</h5>
            <p class="card-text">Thống kê về các dịch vụ, hồ bơi, sự kiện...</p>
            <a href="statistics.html" class="btn btn-primary">Xem Chi Tiết</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
