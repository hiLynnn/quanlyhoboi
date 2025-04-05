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
                            <li><a class="dropdown-item" href="{{route('customer.show', Auth::id())}}">Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a></li>
                        </ul>
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
                                    <input type="range" class="form-range" id="maxFee" min="0" max="500000" step="10"
                                        value="250" oninput="updateMaxFeeValue(this.value)">
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
        <script src="{{asset('user/js/main.js')}}"></script>

        <!-- Leaflet Routing Machine JS -->
        <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

        <!-- Custom JS -->
        <script>
            async function searchPools() {
                console.log("🔍 Bắt đầu tìm kiếm hồ bơi...");

                const typeElement = document.getElementById("type");
                const distanceElement = document.getElementById("distance");
                const maxFeeElement = document.getElementById("maxFee");
                const poolList = document.getElementById("poolList");

                if (!typeElement || !distanceElement || !maxFeeElement || !poolList) {
                    console.error("❌ Một hoặc nhiều phần tử đầu vào không tìm thấy.");
                    alert("Lỗi: Một hoặc nhiều phần tử đầu vào không tồn tại trên trang!");
                    return;
                }

                let type = typeElement.options[typeElement.selectedIndex].text.trim();
                let distance = parseFloat(distanceElement.value);
                let maxFee = parseFloat(maxFeeElement.value);

                let queryParams = [];

                if (type && type !== "Chọn loại hồ bơi") {
                    queryParams.push(`type=${encodeURIComponent(type)}`);
                }
                if (!isNaN(distance) && distance > 0) {
                    queryParams.push(`distance=${distance}`);
                }
                if (!isNaN(maxFee) && maxFee > 0) {
                    queryParams.push(`maxFee=${maxFee}`);
                }

                if (queryParams.length === 0) {
                    alert("⚠️ Vui lòng nhập ít nhất một tiêu chí tìm kiếm!");
                    return;
                }

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(async function (position) {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;

                        console.log(`📍 Vị trí hiện tại: ${lat}, ${lng}`);

                        queryParams.push(`lat=${lat}`);
                        queryParams.push(`lng=${lng}`);

                        let apiUrl = `http://127.0.0.1:8000/api/pools/search?${queryParams.join("&")}`;

                        console.log(`🔗 Gọi API: ${apiUrl}`);

                        try {
                            const response = await fetch(apiUrl);
                            if (!response.ok) {
                                throw new Error(`Lỗi API: ${response.status} - ${response.statusText}`);
                            }

                            const result = await response.json();
                            if (!result || !result.data || result.data.length === 0) {
                                poolList.innerHTML = "<p class='text-danger'>⚠️ Không tìm thấy hồ bơi phù hợp!</p>";
                                return;
                            }

                            const pools = result.data.map(pool => ({
                                id: pool.id_pool,
                                name: pool.name,
                                lat: pool.lat,
                                lng: pool.lng,
                                type: pool.type || "private",
                                address: `${pool.house_number || "N/A"}, ${pool.street?.name || "N/A"}, ${pool.street?.ward?.name || "N/A"}, ${pool.street?.ward?.district?.name || "N/A"}`,
                                price: {
                                    adult: `${pool.adult_price} VNĐ`,
                                    child: `${pool.children_price} VNĐ`,
                                    student: `${pool.student_price} VNĐ`
                                },
                                image: pool.img
                            }));

                            // Hiển thị danh sách hồ bơi
                            poolList.innerHTML = pools.map(pool => `
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <img src="${pool.image}" class="card-img-top" alt="Hồ bơi ${pool.name}">
                                        <div class="card-body">
                                            <a href="pool-detail-customer.html?poolId=${pool.id}" class="card-title">
                                                <h5>${pool.name}</h5>
                                            </a>
                                            <p class="card-text">📍 Địa chỉ: ${pool.address}</p>
                                            <h6><strong>💰 Phí vào cổng:</strong></h6>
                                            <ul class="list-unstyled">
                                                <li><strong>👨‍🦳 Người lớn:</strong> ${pool.price.adult}</li>
                                                <li><strong>🧒 Trẻ em:</strong> ${pool.price.child}</li>
                                                <li><strong>🎓 Học sinh/Sinh viên:</strong> ${pool.price.student}</li>
                                            </ul>
                                            <button class="btn btn-primary" onclick="displayRoute([${pool.lat}, ${pool.lng}])">📍 Hiển thị lộ trình</button>
                                        </div>
                                    </div>
                                </div>
                            `).join('');

                            renderPools(pools);
                            renderMarker(pools);
                        } catch (error) {
                            console.error("❌ Lỗi khi gọi API:", error);
                            alert("⚠️ Không tìm thấy hồ bơi phù hợp!");
                        }
                    }, function (error) {
                        console.error("❌ Lỗi khi lấy vị trí người dùng:", error);
                        alert("⚠️ Không thể lấy vị trí của bạn! Vui lòng kiểm tra cài đặt trình duyệt.");
                    });
                } else {
                    alert("❌ Trình duyệt của bạn không hỗ trợ định vị!");
                }
            }

            function logout() {
                // Lấy thông tin người dùng từ localStorage
                const authToken = localStorage.getItem("authToken");  // Lấy token từ "authToken"

                if (!authToken) {
                    alert("Bạn chưa đăng nhập!");
                    return;  // Nếu không có token, thông báo và dừng lại
                }

                // Gửi yêu cầu POST tới API để đăng xuất
                fetch("http://127.0.0.1:8000/api/logout", {
                    method: "POST",  // Sử dụng phương thức POST
                    headers: {
                        "Content-Type": "application/json",  // Đảm bảo gửi dữ liệu ở dạng JSON
                        "Authorization": `Bearer ${authToken}`  // Gửi token qua header Authorization
                    }
                })
                    .then(response => response.json())  // Chuyển phản hồi từ server thành JSON
                    .then(data => {
                        // Kiểm tra mã trạng thái phản hồi
                        if (data.status === "success" || data.status === 200) {
                            alert("Đăng xuất thành công!");
                            // Xóa thông tin người dùng và token khỏi localStorage
                            localStorage.removeItem("authToken");
                            localStorage.removeItem("loggedInUser");
                            // Chuyển hướng đến trang đăng nhập
                            window.location.href = "login.html";
                        } else {
                            // Nếu có lỗi, hiển thị thông báo lỗi
                            alert(data.message || "Có lỗi xảy ra, vui lòng thử lại!");
                        }
                    })
                    .catch(error => {
                        // Xử lý lỗi nếu có sự cố khi gọi API
                        console.error("Lỗi khi gọi API logout:", error);
                        alert("Có lỗi xảy ra, vui lòng thử lại!");
                    });
            }

            async function fetchPools() {
                try {
                    const response = await fetch("http://127.0.0.1:8000/api/pools");
                    const result = await response.json();
                    console.log("Dữ liệu từ API:", result); // Kiểm tra dữ liệu API
                    return result.data; // API có thể trả về object chứa `data`
                } catch (error) {
                    console.error("Lỗi khi lấy dữ liệu hồ bơi:", error);
                    return [];
                }
            }

            // Gọi hàm để lấy dữ liệu
            fetchPools();
            async function fetchAndRenderPools() {
                try {
                    const response = await fetch("http://127.0.0.1:8000/api/pools");
                    const result = await response.json(); // Nhận toàn bộ response

                    // Kiểm tra API có trả về danh sách hồ bơi không
                    if (!result.data || !Array.isArray(result.data)) {
                        console.error("Dữ liệu API không hợp lệ hoặc không phải là mảng", result);
                        return;
                    }

                    const pools = result.data.map(pool => ({
                        id: pool.id_pool,
                        name: pool.name,
                        lat: pool.lat,
                        lng: pool.lng,
                        type: pool.type || "private",
                        address: `${pool.house_number || "N/A"}, ${pool.street?.name || "N/A"}, ${pool.street?.ward?.name || "N/A"}, ${pool.street?.ward?.district?.name || "N/A"}`,
                        price: {
                            adult: `${pool.adult_price} VNĐ`,
                            child: `${pool.children_price} VNĐ`,
                            student: `${pool.student_price} VNĐ`
                        },
                        image: pool.img
                    }));

                    renderPools(pools);
                    renderMarker(pools);
                } catch (error) {
                    console.error("Lỗi khi lấy dữ liệu hồ bơi:", error);
                }
            }

            // Khởi tạo bản đồ
            var map = L.map('map').setView([10.762622, 106.660172], 13); // Toạ độ trung tâm

            // Thêm lớp bản đồ OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            let markers = []; // Lưu danh sách markers

            const poolIcons = {
                "Hồ bơi công cộng": L.icon({
                    iconUrl: 'https://img.freepik.com/free-vector/3d-gradient-map-pin_78370-1524.jpg?semt=ais_hybrid', // Thay bằng link ảnh thực tế
                    iconSize: [32, 32]
                }),
                "Hồ bơi thi đấu": L.icon({
                    iconUrl: 'https://media.istockphoto.com/id/1333566220/vector/location-icon-vector-free-download-in-blue-clipart-symbol-maps.jpg?s=612x612&w=0&k=20&c=vSr4fkUKdMwcmDDa5a0OvPiyNGeGblkrKJtINijHyEs=',
                    iconSize: [32, 32]
                }),
                "Hồ bơi trẻ em": L.icon({
                    iconUrl: 'https://atlas-content-cdn.pixelsquid.com/stock-images/location-marker-computer-icon-3A8DGBC-600.jpg',
                    iconSize: [32, 32]
                }),
                "Hồ bơi tư nhân": L.icon({
                    iconUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIisiVg7wQAbjb7OpuOX1sPm_CCoWjPa7cLA&s',
                    iconSize: [32, 32]
                })
            };

            function renderMarker(pools) {
                // Xóa tất cả marker cũ trước khi thêm marker mới
                markers.forEach(marker => map.removeLayer(marker));
                markers = []; // Reset danh sách marker

                pools.forEach(function (pool) {
                    var poolLocation = [pool.lat, pool.lng];

                    // Đảm bảo loại hồ bơi hợp lệ
                    var iconType = poolIcons[pool.type] || poolIcons.private;

                    // Thêm popup với tên và địa chỉ của hồ bơi
                    console.log(`Loại hồ bơi: ${pool.type}, Icon URL: ${iconType.options.iconUrl}`);

                    var marker = L.marker(poolLocation, { icon: iconType }).addTo(map);

                    marker.bindPopup(`
                    <b>${pool.name}</b><br>
                    📍 Địa chỉ: ${pool.address}<br>
                    💰 Giá vé:
                    <ul>
                        <li>Người lớn: <b>${pool.price.adult} VNĐ</b></li>
                        <li>Trẻ em: <b>${pool.price.child} VNĐ</b></li>
                        <li>Sinh viên: <b>${pool.price.student} VNĐ</b></li>
                    </ul>
                `).openPopup();

                    // Lắng nghe sự kiện click để hiển thị lộ trình
                    marker.on('click', function () {
                        document.getElementById('getDirectionsBtn').onclick = function () {
                            displayRoute(poolLocation);
                        };
                    });

                    // Lưu marker vào danh sách để có thể xóa sau này
                    markers.push(marker);
                });
            }

            // Định nghĩa userIcon (ví dụ: icon màu xanh)
            var userIcon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/64/64113.png', // Đường dẫn icon
                iconSize: [30, 30], // Kích thước icon
                iconAnchor: [15, 30], // Điểm neo
                popupAnchor: [0, -30] // Vị trí popup
            });

            let routeControl = null; // Lưu tuyến đường hiện tại
            let userMarker = null;   // Lưu marker của người dùng

            function displayRoute(poolLocation) {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var userLocation = [position.coords.latitude, position.coords.longitude];

                        // Xóa marker user cũ trước khi thêm mới
                        if (userMarker) {
                            console.log("🗑 Xóa marker cũ của user");
                            map.removeLayer(userMarker);
                        }

                        // Thêm marker mới của user
                        userMarker = L.marker(userLocation, { icon: userIcon }).addTo(map);
                        console.log("✅ Thêm marker mới của user:", userMarker);

                        // Xóa tuyến đường cũ nếu có
                        if (routeControl) {
                            console.log("🗑 Xóa tuyến đường cũ");
                            map.removeControl(routeControl);
                        }

                        // Tạo tuyến đường mới (chỉ vẽ đường, không tạo thêm marker)
                        routeControl = L.Routing.control({
                            waypoints: [
                                L.latLng(userLocation),
                                L.latLng(poolLocation)
                            ],
                            routeWhileDragging: true,
                            createMarker: function () { return null; } // Ngăn chặn tạo thêm marker
                        }).addTo(map);

                    }, function (error) {
                        console.error("❌ Lỗi khi lấy vị trí người dùng:", error);
                        alert("⚠️ Không thể lấy vị trí của bạn! Vui lòng kiểm tra cài đặt trình duyệt.");
                    });
                } else {
                    alert("❌ Trình duyệt của bạn không hỗ trợ định vị!");
                }
            }


            function renderPools(pools) {
                const poolList = document.getElementById("poolList");
                poolList.innerHTML = ""; // Xóa danh sách cũ

                pools.forEach((pool, index) => {
                    if (index % 3 === 0) {
                        poolList.insertAdjacentHTML('beforeend', '<div class="w-100"></div>');
                    }

                    poolList.insertAdjacentHTML('beforeend', `
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- Chỉnh sửa ở đây: dùng thẻ <a> thay vì thẻ <h5> -->
                                <a href="pool-detail-customer.html?poolId=${pool.id}" class="card-title">
                                    <h5>${pool.name}</h5>
                                </a>
                                <p class="card-text">📍 Địa chỉ: ${pool.address}</p>
                                <h6><strong>💰 Phí vào cổng:</strong></h6>
                                <ul class="list-unstyled">
                                    <li><strong>👨‍🦳 Người lớn:</strong> ${pool.price.adult}</li>
                                    <li><strong>🧒 Trẻ em:</strong> ${pool.price.child}</li>
                                    <li><strong>🎓 Học sinh/Sinh viên:</strong> ${pool.price.student}</li>
                                </ul>
                                <button class="btn btn-primary" onclick="displayRoute([${pool.lat}, ${pool.lng}])">📍 Hiển thị lộ trình</button>
                            </div>
                        </div>
                    </div>
                `);
                });
            }

            // Gọi hàm để lấy dữ liệu và hiển thị
            fetchAndRenderPools();

            function updateMaxFeeValue(value) {
                document.getElementById("maxFeeValue").textContent = new Intl.NumberFormat('vi-VN').format(value) + " VNĐ";
            }

            function getCurrentLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        document.getElementById("latitude").value = position.coords.latitude;
                        document.getElementById("longitude").value = position.coords.longitude;
                    }, function (error) {
                        alert("Không thể lấy vị trí: " + error.message);
                    });
                } else {
                    alert("Trình duyệt của bạn không hỗ trợ GPS.");
                }
            }

            async function searchCheapPool() {
                console.log("🔍 Bắt đầu tìm kiếm hồ bơi giá rẻ...");

                const ticketTypeElement = document.getElementById("ticketType");

                const poolList = document.getElementById("poolList");
                const serviceCheckboxes = document.querySelectorAll(".service-checkbox");

                if (!ticketTypeElement || !poolList) {
                    console.error("❌ Một hoặc nhiều phần tử đầu vào không tìm thấy.");
                    alert("Lỗi: Một hoặc nhiều phần tử đầu vào không tồn tại trên trang!");
                    return;
                }

                let ticketType = ticketTypeElement.value.trim();
                let selectedServices = Array.from(serviceCheckboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => parseInt(checkbox.value));

                if (!ticketType || selectedServices.length === 0) {
                    alert("⚠️ Vui lòng chọn loại vé và ít nhất một dịch vụ!");
                    return;
                }

                let lat = document.getElementById("latitude").value.trim();
                let lng = document.getElementById("longitude").value.trim();

                // Nếu không có vị trí, lấy từ geolocation
                if (!lat || !lng) {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(async function (position) {
                            lat = position.coords.latitude;
                            lng = position.coords.longitude;
                            await fetchCheapPools(ticketType, selectedServices, lat, lng);
                        }, function (error) {
                            console.warn("⚠️ Không thể lấy vị trí. Tiếp tục tìm kiếm mà không có tọa độ.");
                            fetchCheapPools(ticketType, selectedServices, null, null);
                        });
                    } else {
                        console.warn("❌ Trình duyệt không hỗ trợ định vị.");
                        fetchCheapPools(ticketType, selectedServices, null, null);
                    }
                } else {
                    await fetchCheapPools(ticketType, selectedServices, lat, lng);
                }
            }

            async function fetchCheapPools(ticketType, selectedServices, lat, lng) {
                let queryParams = new URLSearchParams({
                    ticket_type: ticketType,
                    lat: lat,
                    lng: lng
                });

                // Append selected services
                selectedServices.forEach(service => queryParams.append("services[]", service));

                const apiUrl = `http://127.0.0.1:8000/api/pools/cheapPools?${queryParams}`;

                console.log(`🔗 Gọi API: ${apiUrl}`);

                try {
                    const response = await fetch(apiUrl, {
                        method: "GET",
                        headers: {
                            "Accept": "application/json"
                        }
                    });

                    if (!response.ok) {
                        throw new Error(`Lỗi API: ${response.status} - ${response.statusText}`);
                    }

                    const result = await response.json();

                    // Clear previous pool list
                    const poolList = document.getElementById("poolList"); // Display container
                    poolList.innerHTML = "";

                    if (!result || !result.data || Object.keys(result.data).length === 0) {
                        poolList.innerHTML = "<p class='text-danger'>⚠️ Không tìm thấy hồ bơi giá rẻ!</p>";
                        return;
                    }

                    // Process and map pools data from the API response
                    const pools = Object.values(result.data).map(pool => ({
                        id: pool.id_pool,
                        name: pool.name,
                        lat: pool.lat,
                        lng: pool.lng,
                        type: pool.type || "private", // Default to "private" if type is not available
                        address: `${pool.house_number || "N/A"}, ${pool.street?.name || "N/A"}, ${pool.street?.ward?.name || "N/A"}, ${pool.street?.ward?.district?.name || "N/A"}`,
                        price: {
                            adult: `${pool.adult_price} VNĐ`,
                            child: `${pool.children_price} VNĐ`,
                            student: `${pool.student_price} VNĐ`
                        },
                        image: pool.img,
                        distance: pool.distance_km.toFixed(2),  // Distance in km (rounded to 2 decimal places)
                    }));

                    // Hiển thị danh sách hồ bơi
                    poolList.innerHTML = pools.map(pool => `
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <a href="pool-detail-guest.html?poolId=${pool.id}" class="card-title">
                                        <h5>${pool.name}</h5>
                                    </a>

                                    <h6><strong>💰 Phí vào cổng:</strong></h6>
                                    <ul class="list-unstyled">
                                        <li><strong>👨‍🦳 Người lớn:</strong> ${pool.price.adult}</li>
                                        <li><strong>🧒 Trẻ em:</strong> ${pool.price.child}</li>
                                        <li><strong>🎓 Học sinh/Sinh viên:</strong> ${pool.price.student}</li>
                                    </ul>
                                    <button class="btn btn-primary" onclick="displayRoute([${pool.lat}, ${pool.lng}])">📍 Hiển thị lộ trình</button>
                                </div>
                            </div>
                        </div>
                    `).join('');

                    // renderPools(pools);
                    // renderMarker(pools);
                } catch (error) {
                    console.error("❌ Lỗi khi gọi API:", error);
                    const poolList = document.getElementById("poolList");
                    poolList.innerHTML = "<p class='text-danger'>⚠️ Không tìm thấy hồ bơi giá rẻ!</p>";
                }
            }

            // Hàm để chọn màu theo số lượng hồ bơi
            function getColor(count) {
                return count > 4 ? '#003366' :    // Dark Blue
                    count > 3 ? '#0066cc' :    // Medium Blue
                        count > 2 ? '#66ccff' :    // Light Blue
                            count > 1 ? '#99ff99' :    // Light Green
                                count > 0 ? '#ccff66' :    // Light Yellow-Green
                                    '#ffffcc';                 // Light Yellow
            }

            // Load dữ liệu từ GeoJSON
            fetch('https://raw.githubusercontent.com/Nhn2025/geojson-data/main/diaphanhuyen.geojson')
                .then(response => response.json())
                .then(geojsonData => {
                    // Load dữ liệu từ API
                    fetch('http://127.0.0.1:8000/api/pools/statistics')
                        .then(response => response.json())
                        .then(apiData => {
                            let poolStats = {};
                            apiData.data.forEach(d => {
                                poolStats[d.district] = {
                                    total: d.total_pools,
                                    pools: d.pools // Danh sách loại hồ bơi trong huyện
                                };
                            });

                            // Thêm layer vào bản đồ
                            L.geoJson(geojsonData, {
                                style: function (feature) {
                                    let districtName = feature.properties.Ten_Huyen;
                                    let poolData = poolStats[districtName] || { total: 0, pools: [] };
                                    return {
                                        fillColor: getColor(poolData.total),
                                        weight: 2,
                                        opacity: 1,
                                        color: 'white',
                                        dashArray: '3',
                                        fillOpacity: 0.7
                                    };
                                },
                                onEachFeature: function (feature, layer) {
                                    let districtName = feature.properties.Ten_Huyen;
                                    let poolData = poolStats[districtName] || { total: 0, pools: [] };

                                    // Nội dung popup hiển thị danh sách hồ bơi
                                    let poolsInfo = poolData.pools.map(pool =>
                                        `<b>${pool.type}:</b> ${pool.count}`
                                    ).join("<br>");

                                    layer.bindPopup(`<b>${districtName}</b><br>Hồ bơi: ${poolData.total}<br>${poolsInfo}`);

                                    layer.on('mouseover', function (e) {
                                        this.setStyle({
                                            weight: 3,
                                            color: '#666',
                                            fillOpacity: 0.9
                                        });
                                        this.openPopup();
                                    });

                                    layer.on('mouseout', function (e) {
                                        this.setStyle({
                                            weight: 2,
                                            color: 'white',
                                            fillOpacity: 0.7
                                        });
                                        this.closePopup();
                                    });
                                }
                            }).addTo(map);
                        });
                });

        </script>

</body>

</html>
