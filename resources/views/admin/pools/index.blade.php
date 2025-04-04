{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
    <h2>Danh Sách Hồ Bơi</h2>
    <a href="{{ route('pools.create') }}" class="btn btn-primary mb-3">Thêm Hồ Bơi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Hồ Bơi</th>
                <th>Loại</th>
                <th>Giá Trẻ Em</th>
                <th>Giá Người Lớn</th>
                <th>Giá Học Sinh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pools as $pool)
            <tr>
                <td>{{ $pool->id }}</td>
                <td>{{ $pool->name }}</td>
                <td>{{ $pool->type }}</td>
                <td>{{ $pool->children_price }}</td>
                <td>{{ $pool->adult_price }}</td>
                <td>{{ $pool->student_price }}</td>
                <td>
                    {{-- <a href="{{ route('pools.edit', $pool->id) }}" class="btn btn-warning">Sửa</a> --}}
                    {{-- <form action="{{ route('pools.destroy', $pool->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

