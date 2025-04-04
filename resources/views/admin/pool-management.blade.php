<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Hồ Bơi</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Quản Lý Hồ Bơi</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="index.html">Trang Chủ</a></li>
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

    <!-- Modal Thêm Hồ Bơi -->
    <div class="modal fade" id="addPoolModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Hồ Bơi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addPoolForm">
                        <div class="mb-3">
                            <label>ID</label>
                            <input type="text" class="form-control" id="addPoolID" required>
                        </div>

                        <div class="mb-3">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" id="addPoolImage" required>
                        </div>

                        <div class="mb-3">
                            <label>Tên Hồ Bơi</label>
                            <input type="text" class="form-control" id="addPoolName" required>
                        </div>

                        <div class="mb-3">
                            <label>Loại Hồ Bơi</label>
                            <select class="form-control" id="addPoolType" required>
                                <option value="Hồ bơi công cộng">Hồ bơi công cộng</option>
                                <option value="Hồ bơi tư nhân">Hồ bơi tư nhân</option>
                                <option value="Hồ bơi trẻ em">Hồ bơi trẻ em</option>
                                <option value="Hồ bơi thi đấu">Hồ bơi thi đấu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" id="addHouseNumber" placeholder="Số nhà" required>
                            <input type="text" class="form-control mt-2" id="addStreetID" placeholder="ID Đường" required>
                        </div>

                        <div class="mb-3">
                            <label>Toạ độ</label>
                            <input type="text" class="form-control" id="addLatitude" placeholder="Vĩ độ" required>
                            <input type="text" class="form-control mt-2" id="addLongitude" placeholder="Kinh độ" required>
                        </div>

                        <div class="mb-3">
                            <label>Kích thước (m)</label>
                            <input type="number" class="form-control" id="addPoolLength" placeholder="Dài" required>
                            <input type="number" class="form-control mt-2" id="addPoolWidth" placeholder="Rộng" required>
                        </div>

                        <div class="mb-3">
                            <label>Độ sâu (m)</label>
                            <input type="number" class="form-control" id="addPoolDepth" required>
                        </div>

                        <div class="mb-3">
                            <label>Giá vé (VND)</label>
                            <input type="number" class="form-control" id="addChildrenPrice" placeholder="Trẻ em" required>
                            <input type="number" class="form-control mt-2" id="addAdultPrice" placeholder="Người lớn" required>
                            <input type="number" class="form-control mt-2" id="addStudentPrice" placeholder="Học sinh" required>
                        </div>

                        <div class="mb-3">
                            <label>Giờ Mở</label>
                            <input type="time" class="form-control" id="addOpeningHours" required>
                        </div>

                        <div class="mb-3">
                            <label>Giờ Đóng</label>
                            <input type="time" class="form-control" id="addClosingHours" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Lưu</button>
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
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            let authToken = localStorage.getItem("authToken") || "";

            // Hàm tải danh sách hồ bơi
            function loadPools() {
                $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/api/pools",
                    headers: { "Authorization": `Bearer ${authToken}` },
                    success: function (response) {
                        let pools = response.data || [];
                        let poolList = pools.map((pool) => `
                            <tr>
                                <td>${pool.id_pool}</td>
                                <td>${pool.name}</td>
                                <td>${pool.house_number}</td>
                                <td>${pool.id_street}</td>
                                <td>${pool.lat}</td>
                                <td>${pool.lng}</td>
                                <td>${pool.length} m</td>
                                <td>${pool.width} m</td>
                                <td>${pool.depth} m</td>
                                <td>${pool.type}</td>
                                <td>${pool.opening_hours}</td>
                                <td>${pool.close_hours}</td>
                                <td><img src="${pool.img}" alt="Ảnh hồ bơi" width="100"></td>
                                <td>${pool.children_price} VND</td>
                                <td>${pool.adult_price} VND</td>
                                <td>${pool.student_price} VND</td>
                                <td>
                                    <button class="btn btn-warning btn-sm edit-btn" data-id="${pool.id_pool}">Sửa</button>
                                    <button class="btn btn-danger btn-sm delete-btn" data-id="${pool.id_pool}">Xóa</button>
                                </td>
                            </tr>
                        `).join('');
                        $("#poolList").html(poolList);
                    },
                    error: function () {
                        alert("Không thể tải danh sách hồ bơi. Vui lòng thử lại.");
                    }
                });
            }

            // Thêm hồ bơi
            $("#addPoolForm").submit(function (e) {
                e.preventDefault();

                let formData = new FormData();
                formData.append("name", $("#addPoolName").val());
                formData.append("house_number", $("#addHouseNumber").val());
                formData.append("id_street", $("#addStreetID").val());
                formData.append("lat", $("#addLatitude").val());
                formData.append("lng", $("#addLongitude").val());
                formData.append("length", $("#addPoolLength").val());
                formData.append("width", $("#addPoolWidth").val());
                formData.append("depth", $("#addPoolDepth").val());
                formData.append("type", $("#addPoolType").val());
                formData.append("children_price", $("#addChildrenPrice").val());
                formData.append("adult_price", $("#addAdultPrice").val());
                formData.append("student_price", $("#addStudentPrice").val());
                formData.append("opening_hours", $("#addOpeningHours").val());
                formData.append("close_hours", $("#addClosingHours").val());
                formData.append("img", $("#addPoolImage")[0].files[0]);

                $.ajax({
                    type: "POST",
                    url: "http://127.0.0.1:8000/api/pools",
                    headers: { "Authorization": `Bearer ${authToken}` },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function () {
                        loadPools();
                        $("#addPoolModal").modal('hide');
                    },
                    error: function () {
                        alert("Không thể thêm hồ bơi. Vui lòng thử lại.");
                    }
                });
            });

            // Sửa hồ bơi
            $(document).on("click", ".edit-btn", function () {
                let poolId = $(this).data("id");

                $.ajax({
                    type: "GET",
                    url: `http://127.0.0.1:8000/api/pools/${poolId}`,
                    headers: { "Authorization": `Bearer ${authToken}` },
                    success: function (response) {
                        let pool = response.data;
                        $("#editPoolID").val(pool.id_pool);
                        $("#editPoolName").val(pool.name);
                        $("#editHouseNumber").val(pool.house_number);
                        $("#editStreetID").val(pool.id_street);
                        $("#editLatitude").val(pool.lat);
                        $("#editLongitude").val(pool.lng);
                        $("#editPoolLength").val(pool.length);
                        $("#editPoolWidth").val(pool.width);
                        $("#editPoolDepth").val(pool.depth);
                        $("#editPoolType").val(pool.type);
                        $("#editChildrenPrice").val(pool.children_price);
                        $("#editAdultPrice").val(pool.adult_price);
                        $("#editStudentPrice").val(pool.student_price);
                        $("#editOpeningHours").val(pool.opening_hours);
                        $("#editClosingHours").val(pool.close_hours);
                    },
                    error: function () {
                        alert("Không thể tải thông tin hồ bơi. Vui lòng thử lại.");
                    }
                });
            });

            // Xoá hồ bơi
            $(document).on("click", ".delete-btn", function () {
                let poolId = $(this).data("id");

                if (confirm("Bạn có chắc chắn muốn xóa hồ bơi này không?")) {
                    $.ajax({
                        type: "DELETE",
                        url: `http://127.0.0.1:8000/api/pools/${poolId}`,
                        headers: { "Authorization": `Bearer ${authToken}` },
                        success: function () {
                            loadPools();
                        },
                        error: function () {
                            alert("Không thể xóa hồ bơi. Vui lòng thử lại.");
                        }
                    });
                }
            });

            // Tải danh sách hồ bơi khi trang được tải
            loadPools();
        });
    </script>
</body>
</html>
