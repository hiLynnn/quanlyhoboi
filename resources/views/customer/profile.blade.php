<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý hồ bơi</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Leaflet Routing Machine CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index-customer.html">Quản lý hồ bơi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-user text-white" style="font-size: 1rem;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="{{ route('customer.show', Auth::id()) }}">Thông tin cá
                                    nhân</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Thông Tin Khách Hàng</h2>
        <form id="editCustomerForm" action="{{ route('customer.update', $customer->id_user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Họ Tên</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $customer->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Số Điện Thoại</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="{{ old('phone', $customer->phone) }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" id="password" name="password"
                    value="{{ old('password', $customer->password) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>

    </div>
    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-3">
        <p>&copy; 2025 Quản lý hồ bơi. Tất cả các quyền được bảo lưu.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Custom JS -->
    <script src="js/main.js"></script>

    <!-- Leaflet Routing Machine JS -->
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

</body>

</html>
