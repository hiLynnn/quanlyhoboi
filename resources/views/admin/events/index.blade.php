@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Danh Sách Sự Kiện</h2>

        <div class="mb-3">
            <input type="text" class="form-control" id="searchEvent" placeholder="Tìm kiếm sự kiện..."
                oninput="searchEvent()">
        </div>

        <a href="{{ route('events.create') }}">
            <button class="btn btn-primary mb-3">Thêm Sự Kiện</button>
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Sự Kiện</th>
                    <th>Mô tả</th>
                    <th>Loại</th>
                    <th>Thời Gian</th>
                    <th>Số Lượng</th>
                    <th>Phí</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody id="eventList">
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->type }}</td>
                        <td>{{ $event->organization_date }}</td>
                        <td>{{ $event->max_participants }}</td>
                        <td>{{ $event->price }}</td>
                        <td>
                            <a href="{{ route('events.edit', $event->id_event) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('events.destroy', $event->id_event) }}" method="POST" style="display:inline;">
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
        const searchInput = document.getElementById('searchEvent');
        const eventList = document.getElementById('eventList');

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
