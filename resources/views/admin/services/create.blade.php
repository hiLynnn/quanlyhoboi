@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Thêm dịch vụ</h2>
        <form id="addServiceForm" action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="serviceId" class="form-label">Chọn Dịch Vụ</label>
                <select class="form-control" id="serviceId" name="service_id" required>
                    <option value="">Chọn Dịch Vụ</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id_service }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="poolId" class="form-label">Chọn Hồ Bơi</label>
                <select class="form-control" id="poolId" name="pool_id" required>
                    <option value="">Chọn Hồ Bơi</option>
                    @foreach($pools as $pool)
                        <option value="{{ $pool->id_pool }}">{{ $pool->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="servicePrice" class="form-label">Giá Dịch Vụ</label>
                <input type="number" class="form-control" id="servicePrice" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
