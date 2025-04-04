<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Quản Lý Hồ Bơi</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('dashboard')}}">Quản Lý Hồ Bơi</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="{{route('dashboard')}}">Trang Chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="pool-management.html">Quản Lý Hồ Bơi</a></li>
                <li class="nav-item"><a class="nav-link" href="service-management.html">Quản Lý Dịch Vụ</a></li>
                <li class="nav-item"><a class="nav-link" href="service-management2.html">Quản Lý Dịch Vụ Của Hồ Bơi</a></li>
                <li class="nav-item"><a class="nav-link active" href="event-management.html">Quản Lý Sự Kiện</a></li>
                <li class="nav-item"><a class="nav-link" href="facility-management.html">Quản Lý Tiện Ích</a></li>
                <li class="nav-item"><a class="nav-link" href="eventregistrations.html">Quản Lý Phiếu Đăng Ký</a></li>
                <li class="nav-item"><a class="nav-link" href="infor-customer.html">Thông Tin Khách Hàng</a></li>
                <li class="nav-item"><a class="nav-link" href="review-management.html">Đánh Giá Khách Hàng</a></li>
                <li class="nav-item"><a class="nav-link" href="statistics.html">Thống kê</a></li>

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

    <div class="container mt-5">
        <h2>Danh Sách Hồ Bơi</h2>

        <input type="text" id="searchPool" class="form-control mb-3" placeholder="Tìm kiếm hồ bơi...">
        <button id="addPoolBtn" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPoolModal">
            Thêm Hồ Bơi
        </button>




        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Hồ Bơi</th>
                    <th>Số Nhà</th>
                    <th>ID Đường</th>
                    <th>Vĩ độ</th>
                    <th>Kinh độ</th>
                    <th>Chiều dài</th>
                    <th>Chiều rộng</th>
                    <th>Độ sâu</th>
                    <th>Loại</th>
                    <th>Giờ Mở</th>
                    <th>Giờ Đóng</th>
                    <th>Ảnh</th>
                    <th>Giá Trẻ Em</th>
                    <th>Giá Người Lớn</th>
                    <th>Giá Học Sinh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="poolList"></tbody>
        </table>
    </div>
</body>
</html>
