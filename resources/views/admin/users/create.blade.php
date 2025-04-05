@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Thêm khách hàng</h2>
        <form id="addCustomerForm"action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Họ Tên</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Số Điện Thoại</label>
              <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Mật Khẩu</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select class="form-control" id="role" name="role">
                <option value="admin">Admin</option>
                <option value="customer">Khách hàng</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
          </form>

    </div>
@endsection
