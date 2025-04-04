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
        <button id="addPoolBtn" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPoolModal">Thêm Hồ Bơi</button>



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

    {{-- <!-- Modal Thêm Hồ Bơi -->
    <div class="modal fade" id="addPoolModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Hồ Bơi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Form thêm hồ bơi -->
                    <form id="addPoolForm" action="{{ route('cms.add-pool') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- CSRF token để bảo vệ form khỏi các cuộc tấn công CSRF -->
                        <div class="mb-3">
                            <label for="name">Tên Hồ Bơi</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="house_number">Số Nhà</label>
                            <input type="text" class="form-control" id="house_number" name="house_number" required>
                        </div>

                        <div class="mb-3">
                            <label for="id_street">Địa chỉ</label>
                            <input type="text" class="form-control" id="id_street" name="id_street" required>
                        </div>

                        <div class="mb-3">
                            <label for="lat">Tọa độ Latitude</label>
                            <input type="text" class="form-control" id="lat" name="lat" required>
                        </div>

                        <div class="mb-3">
                            <label for="lng">Tọa độ Longitude</label>
                            <input type="text" class="form-control" id="lng" name="lng" required>
                        </div>

                        <div class="mb-3">
                            <label for="length">Chiều dài</label>
                            <input type="number" class="form-control" id="length" name="length" required>
                        </div>

                        <div class="mb-3">
                            <label for="width">Chiều rộng</label>
                            <input type="number" class="form-control" id="width" name="width" required>
                        </div>


                        <div class="mb-3">
                            <label for="depth">Chiều sâu</label>
                            <input type="text" class="form-control" id="depth" name="depth" required>
                        </div>

                        <div class="mb-3">
                            <label for="type">Loại Hồ Bơi</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="Hồ bơi công cộng">Hồ bơi công cộng</option>
                                <option value="Hồ bơi tư nhân">Hồ bơi tư nhân</option>
                                <option value="Hồ bơi trẻ em">Hồ bơi trẻ em</option>
                                <option value="Hồ bơi thi đấu">Hồ bơi thi đấu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="opening_hours">Giờ mở cửa</label>
                            <input type="text" class="form-control" id="opening_hours" name="opening_hours" required>
                        </div>

                        <div class="mb-3">
                            <label for="close_hours">Giờ đóng cửa</label>
                            <input type="text" class="form-control" id="close_hours" name="close_hours" required>
                        </div>

                        <div class="mb-3">
                            <label for="img">Hình ảnh</label>
                            <input type="file" class="form-control" id="img" name="img">
                        </div>

                        <div class="mb-3">
                            <label for="children_price">Giá trẻ em</label>
                            <input type="text" class="form-control" id="children_price" name="children_price" required>
                        </div>

                        <div class="mb-3">
                            <label for="adult_price">Giá người lớn</label>
                            <input type="text" class="form-control" id="adult_price" name="adult_price" required>
                        </div>

                        <div class="mb-3">
                            <label for="student_price">Giá học sinh, sinh viên</label>
                            <input type="text" class="form-control" id="student_price" name="student_price" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm Hồ Bơi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Sửa Hồ Bơi -->
    <div class="modal fade" id="editPoolModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa Hồ Bơi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editPoolForm">
                        <div class="mb-3">
                            <label>ID</label>
                            <input type="text" class="form-control" id="editPoolID" readonly>
                        </div>

                        <div class="mb-3">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" id="editPoolImage">
                        </div>

                        <div class="mb-3">
                            <label>Tên Hồ Bơi</label>
                            <input type="text" class="form-control" id="editPoolName" required>
                        </div>

                        <div class="mb-3">
                            <label>Loại Hồ Bơi</label>
                            <select class="form-control" id="editPoolType" required>
                                <option value="Hồ bơi công cộng">Hồ bơi công cộng</option>
                                <option value="Hồ bơi tư nhân">Hồ bơi tư nhân</option>
                                <option value="Hồ bơi trẻ em">Hồ bơi trẻ em</option>
                                <option value="Hồ bơi thi đấu">Hồ bơi thi đấu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" id="editHouseNumber" required>
                            <input type="text" class="form-control mt-2" id="editStreetID" required>
                        </div>

                        <div class="mb-3">
                            <label>Toạ độ</label>
                            <input type="text" class="form-control" id="editLatitude" required>
                            <input type="text" class="form-control mt-2" id="editLongitude" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Moment.js -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>

    {{-- <script>
       $(document).ready(function () {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $('#addPoolForm').on('submit', function (e) {
            e.preventDefault(); // Ngừng gửi form theo cách truyền thống

            // Lấy dữ liệu từ form
            var formData = new FormData(this);

            // Gửi dữ liệu lên server qua AJAX
            $.ajax({
                url: "{{ route('cms.add-pool') }}", // Route đến controller
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Thông báo thành công
                    alert('Thêm hồ bơi thành công!');

                    // Đóng modal sau khi thành công
                    $('#addPoolModal').modal('hide');

                    // Bạn có thể làm gì đó với response nếu muốn
                    // Ví dụ: Cập nhật danh sách hồ bơi mà không tải lại trang.

                    // Reset form
                    $('#addPoolForm')[0].reset();
                },
                error: function (xhr, status, error) {
                    // Xử lý lỗi
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Có lỗi xảy ra: ' + errorMessage);
                }
            });
        });
    });
    </script> --}}
</body>
</html>
