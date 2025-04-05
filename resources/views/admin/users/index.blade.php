@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Danh Sách Khách Hàng</h2>
        <div class="search-container mb-3">
            <input type="text" id="searchInfor" class="form-control" placeholder="Tìm kiếm thông tin khách hàng...">
        </div>
        <a href="{{ route('users.create') }}">
            <button class="btn btn-primary mb-3" id="addCustomerBtn">Thêm Khách Hàng</button>
        </a>

        <!-- Bảng danh sách khách hàng -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ Tên</th>
                    <th>Số Điện Thoại</th>
                    <th>Mật Khẩu</th>
                    <th>Quyền Hạn</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody id="customerList">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id_user) }}" method="POST" style="display:inline;">
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
        const searchInput = document.getElementById('searchInfor');
        const eventList = document.getElementById('customerList');

        // Lắng nghe sự kiện khi người dùng nhập vào ô tìm kiếm
        searchInput.addEventListener('keyup', function() {
            const searchTerm = searchInput.value.toLowerCase();

            // Lặp qua tất cả các hàng trong bảng
            const rows = eventList.getElementsByTagName('tr');

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
