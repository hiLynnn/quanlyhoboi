@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Thông Tin Khách Hàng</h2>
        <form id="editCustomerForm" action="{{ route('users.update', $user->id_user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Họ Tên</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Số Điện Thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone',$user->phone) }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password',$user->password) }}" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Quyền Hạn</label>
                <select class="form-control" id="role" name="role">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Khách hàng</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
    </div>
    <script>
        document.getElementById('editCustomerForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của form

            // Xác nhận trước khi gửi
            if (confirm('Bạn có chắc chắn muốn cập nhật thông tin khách hàng này không?')) {
                this.submit(); // Gửi form nếu người dùng xác nhận
            }
        });
    </script>
@endsection
