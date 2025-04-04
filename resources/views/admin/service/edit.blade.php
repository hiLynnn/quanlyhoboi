@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Sửa dịch vụ</h2>
        @php
            $message = Session::get('message');
            if ($message) {
                echo '<div class="alert alert-success">' . $message . '</div>';
                Session::put('message', null);
            }
        @endphp
        <form id="addServiceForm" action="{{ route('dich-vu.update',$service->id_service) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="addServiceName">Tên Dịch vụ</label>
                <input type="text" name="name" class="form-control input-rounded" id="addServiceName"
                    placeholder="Tên Dịch vụ" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
