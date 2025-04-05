@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5">Chào Mừng Đến Với Hệ Thống Quản Lý Hồ Bơi</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Quản Lý Hồ Bơi -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản Lý Hồ Bơi</h5>
                        <p class="card-text">Quản lý các hồ bơi trong thành phố, cập nhật và kiểm tra các hồ bơi hiện có.</p>
                        <a href="{{route('pools.index')}}" class="btn btn-primary">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>

            <!-- Quản Lý Dịch Vụ -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản Lý Dịch Vụ</h5>
                        <p class="card-text">Quản lý các dịch vụ hồ bơi, các dịch vụ hỗ trợ người tham gia.</p>
                        <a href="{{route('dich-vu.index')}}" class="btn btn-primary">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>

            <!-- Quản Lý Dịch Vụ Của Hồ Bơi -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản Lý Dịch Vụ Của Hồ Bơi</h5>
                        <p class="card-text">Quản lý các dịch vụ hồ bơi về giá cả, về hồ bơi đó.</p>
                        <a href="{{route('services.index')}}" class="btn btn-primary">Xem Chi Tiết</a>
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
                        <a href="{{route('events.index')}}" class="btn btn-primary">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>

            <!-- Quản Lý Tiện Ích -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản Lý Tiện Ích</h5>
                        <p class="card-text">Quản lý các tiện ích tại các hồ bơi, các tiện ích hỗ trợ người tham gia.</p>
                        <a href="{{route('facilities.index')}}" class="btn btn-primary">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>

            <!-- Quản Lý Phiếu Đăng Ký -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản Lý Phiếu Đăng Ký</h5>
                        <p class="card-text">Quản lý các phiếu đăng ký tham gia các sự kiện hoặc dịch vụ tại các hồ bơi.</p>
                        <a href="{{route('registrations.index')}}" class="btn btn-primary">Xem Chi Tiết</a>
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
                        <p class="card-text">Xem thông tin chi tiết về khách hàng đã đăng ký tham gia các dịch vụ và sự
                            kiện.</p>
                        <a href="{{route('users.index')}}" class="btn btn-primary">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>

            <!-- Đánh Giá -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Đánh Giá</h5>
                        <p class="card-text">Xem đánh giá của khách hàng về các dịch vụ, hồ bơi đã tham gia.</p>
                        <a href="{{route('dashboard')}}" class="btn btn-primary">Xem Chi Tiết</a>
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
@endsection
