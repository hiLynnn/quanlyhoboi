@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Quản lý tiện ích</h2>

        <div class="mb-3">
            <input type="text" class="form-control" id="searchInput" placeholder="Tìm kiếm tiện ích..."
                oninput="searchEvent()">
        </div>

        <a href="{{ route('facilities.create') }}">
            <button class="btn btn-primary mb-3">Thêm tiện ích</button>
        </a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Tiện Ích</th>
                    <th>Hồ Bơi</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody id="facilityList">
                @foreach ($poolUtilities as $facility)
                    <tr>
                        <td>{{ $facility->id_pu }}</td>
                        <td>{{ $facility->utility->name}}</td>
                        <td>{{ $facility->pool->name }}</td>
                        <td>
                            <a href="{{ route('facilities.edit', $facility->id_pu) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('facilities.destroy', $facility->id_pu) }}" method="POST" style="display:inline;">
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
        const searchInput = document.getElementById('searchInput');
        const facilityList = document.getElementById('facilityList');

        // Lắng nghe sự kiện khi người dùng nhập vào ô tìm kiếm
        searchInput.addEventListener('keyup', function() {
            const searchTerm = searchInput.value.toLowerCase();

            // Lặp qua tất cả các hàng trong bảng
            const rows = facilityList.getElementsByTagName('tr');

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
