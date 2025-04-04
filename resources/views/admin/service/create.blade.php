@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Thêm dịch vụ</h2>
        <form id="addServiceForm" action="{{ route('dich-vu.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="addServiceName">Tên Dịch vụ</label>
                <input type="text" name="name" class="form-control input-rounded" id="addServiceName"
                    placeholder="Tên Dịch vụ" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
