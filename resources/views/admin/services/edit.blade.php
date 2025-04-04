@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Sửa dịch vụ của hồ bơi</h2>
        @php
            $message = Session::get('message');
            if ($message) {
                echo '<div class="alert alert-success">' . $message . '</div>';
                Session::put('message', null);
            }
        @endphp
        <form id="editServiceForm" action="{{ route('services.update', $poolService->id_ps) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="editServiceId" class="form-label">Chọn Dịch Vụ</label>
                <select class="form-control" id="editServiceId" name="id_service" required>
                    <option value="">Chọn Dịch Vụ</option>
                    @foreach($allServices as $service)
                        <option value="{{ $service->id_service }}"
                            {{ $service->id_service == $poolService->id_service ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="editServicePrice" class="form-label">Giá Dịch Vụ</label>
                <input type="number" class="form-control" id="editServicePrice" name="price"
                    value="{{ old('price', $poolService->price) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
