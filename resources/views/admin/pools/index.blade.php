@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Danh Sách Hồ Bơi</h2>

        <input type="text" id="searchPool" class="form-control mb-3" placeholder="Tìm kiếm hồ bơi...">
        <a href="{{ route('pools.create') }}">
            <button id="addPoolBtn" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPoolModal">Thêm Hồ
                Bơi</button>
        </a>
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
            <tbody id="poolList">
                @foreach ($pools as $pool)
                    <tr>
                        <td>{{ $pool->id_pool }}</td>
                        <td>{{ $pool->name }}</td>
                        <td>{{ $pool->house_number }}</td>
                        <td>{{ $pool->id_street }}</td>
                        <td>{{ $pool->lat }}</td>
                        <td>{{ $pool->lng }}</td>
                        <td>{{ $pool->length }}</td>
                        <td>{{ $pool->width }}</td>
                        <td>{{ $pool->depth }}</td>
                        <td>{{ $pool->type }}</td>
                        <td>{{ $pool->opening_hours }}</td>
                        <td>{{ $pool->close_hours }}</td>
                        <td><img src="{{ asset('storage/' . $pool->img) }}" alt="Pool Image" style="width: 100px;"></td>
                        <td>{{ number_format($pool->child_price, 0, ',', '.') }} VNĐ</td>
                        <td>{{ number_format($pool->adult_price, 0, ',', '.') }} VNĐ</td>
                        <td>{{ number_format($pool->student_price, 0, ',', '.') }} VNĐ</td>
                        <td>
                            <a href="{{ route('pools.edit', $pool->id_pool) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('pools.destroy', $pool->id_pool) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        // Lấy phần tử tìm kiếm và danh sách hồ bơi
        const searchInput = document.getElementById('searchPool');
        const poolList = document.getElementById('poolList');

        // Lắng nghe sự kiện khi người dùng nhập vào ô tìm kiếm
        searchInput.addEventListener('keyup', function() {
            const searchTerm = searchInput.value.toLowerCase();

            // Lặp qua tất cả các hàng trong bảng
            const rows = poolList.getElementsByTagName('tr');

            // Kiểm tra từng hàng nếu tên hồ bơi chứa từ khóa tìm kiếm
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const nameColumn = row.getElementsByTagName('td')[1]; // Cột "Tên Hồ Bơi"

                if (nameColumn) {
                    const nameText = nameColumn.textContent || nameColumn.innerText;
                    if (nameText.toLowerCase().indexOf(searchTerm) > -1) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            }
        });
    </script>
@endsection
