@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Danh Sách Dịch Vụ Hồ Bơi</h2>
        <div class="search-container mb-3">
            <input type="text" id="searchService" class="form-control" placeholder="Tìm kiếm dịch vụ...">
        </div>
        <a href="{{ route('services.create') }}">
            <button class="btn btn-primary mb-3" id="addServiceBtn">Thêm
                Dịch Vụ của hồ bơi</button>
        </a>

        <!-- Bảng danh sách dịch vụ -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Dịch Vụ</th>
                    <th>Giá Dịch Vụ</th>
                    <th>Hồ Bơi</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody id="serviceList">
                @foreach ($poolServices as $index => $poolService)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $poolService->service->name }}</td> <!-- Tên dịch vụ -->
                        <td>{{ $poolService->price }}</td> <!-- Giá dịch vụ -->
                        <td>{{ $poolService->pool->name }}</td> <!-- Tên hồ bơi -->
                        <td>
                            <a href="{{ route('services.edit', $poolService->id_ps) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('services.destroy', $poolService->id_ps) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        // Lấy phần tử tìm kiếm và danh sách hồ bơi
        const searchInput = document.getElementById('searchService');
        const serviceList = document.getElementById('serviceList');

        // Lắng nghe sự kiện khi người dùng nhập vào ô tìm kiếm
        searchInput.addEventListener('keyup', function() {
            const searchTerm = searchInput.value.toLowerCase();

            // Lặp qua tất cả các hàng trong bảng
            const rows = serviceList.getElementsByTagName('tr');

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
