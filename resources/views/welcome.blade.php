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
            <a class="navbar-brand" href="index-guest.html">Quản lý hồ bơi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-light text-primary" href="{{route('login')}}"><i class="fa-solid fa-user text-blue"
                                style="font-size: 1rem;"></i> Đăng nhập</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid mt-3">
        <div class="row">

            <div class="row">
                <!-- Sidebar: Tìm kiếm hồ bơi -->
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">Tìm kiếm hồ bơi</div>
                        <div class="card-body">
                            <form id="searchForm" onsubmit="event.preventDefault(); searchPools();">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Loại hình hồ bơi</label>
                                    <select class="form-select" id="type">
                                        <option value="all">Tất cả</option>
                                        <option value="public">Hồ bơi công cộng</option>
                                        <option value="private">Hồ bơi tư nhân</option>
                                        <option value="children">Hồ bơi trẻ em</option>
                                        <option value="contest">Hồ bơi thi đấu</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="distance" class="form-label">Khoảng cách (km)</label>
                                    <input type="number" class="form-control" id="distance"
                                        placeholder="Nhập khoảng cách">
                                </div>
                                <div class="mb-3">
                                    <label for="maxFee" class="form-label">Phí tối đa (VNĐ)</label>
                                    <input type="range" class="form-range" id="maxFee" min="0"
                                        max="500000" step="10" value="250"
                                        oninput="updateMaxFeeValue(this.value)">
                                    <span id="maxFeeValue">25.000 VNĐ</span>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Tìm
                                    kiếm</button>
                            </form>
                        </div>
                    </div>

                    <!-- Gợi ý hồ bơi rẻ nhất -->
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">Hồ bơi rẻ nhất</div>
                        <div class="card-body" id="cheapestPool">
                            <!-- Chọn loại vé -->
                            <div class="mb-3">
                                <label for="ticketType" class="form-label">Loại vé</label>
                                <select class="form-select" id="ticketType">
                                    <option value="children_price">Trẻ em</option>
                                    <option value="adult_price">Người lớn</option>
                                    <option value="student_price">Học sinh/sinh viên</option>
                                </select>
                            </div>

                            <!-- Bộ lọc dịch vụ -->
                            <div class="mb-3">
                                <label class="form-label">Dịch vụ đi kèm</label>
                                <div class="form-check">
                                    <input class="form-check-input service-checkbox" type="checkbox" id="service_1"
                                        value="1">
                                    <label class="form-check-label" for="service_1">Cho thuê đồ bơi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input service-checkbox" type="checkbox" id="service_2"
                                        value="2">
                                    <label class="form-check-label" for="service_2">Dịch vụ huấn luyện viên bơi
                                        lội</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input service-checkbox" type="checkbox" id="service_3"
                                        value="3">
                                    <label class="form-check-label" for="service_3">Dịch vụ giữ đồ</label>
                                </div>
                            </div>

                            <!-- Nhập hoặc lấy tọa độ -->
                            <div class="mb-3">
                                <label for="latitude" class="form-label">Vị trí của bạn</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="latitude"
                                        placeholder="Vĩ độ (Latitude)">
                                    <input type="text" class="form-control" id="longitude"
                                        placeholder="Kinh độ (Longitude)">
                                    <button class="btn btn-outline-secondary" type="button"
                                        onclick="getCurrentLocation()">📍</button>
                                </div>
                            </div>

                            <!-- Nút Tìm kiếm -->
                            <button type="button" class="btn btn-primary w-100" onclick="searchCheapPool()">Tìm
                                kiếm</button>
                        </div>
                    </div>
                </div>

                <!-- Main: Bản đồ -->
                <div class="col-md-8">
                    <div id="map" style="height: 500px; width: 100%;"></div>
                </div>
            </div>

        </div>

        <br>
        <!-- Danh sách hồ bơi -->
        <div class="card" id="poolListContainer">
            <div class="card-header bg-primary text-white">Danh sách hồ bơi</div>
            <div class="card-body">
                <div class="row" id="poolList"></div>
            </div>
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

        <!-- Custom JS -->

</body>

</html>
