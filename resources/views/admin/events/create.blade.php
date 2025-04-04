@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Thêm sự kiện</h2>
        <form id="addEventForm" action="{{ route('events.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="eventName" class="form-label">Tên Sự Kiện</label>
                <input type="text" class="form-control" id="eventName" name="name" required>
            </div>
            <div class="mb-3">
                <label for="eventDescription" class="form-label">Mô Tả</label>
                <input type="text" class="form-control" id="eventDescription" name="description" required>
            </div>
            <div class="mb-3">
                <label for="eventType" class="form-label">Loại Sự Kiện</label>
                <select class="form-control" id="eventType" name="type" required>
                    <option value="Thể Thao">Thể Thao</option>
                    <option value="Giáo dục">Giáo dục</option>
                    <option value="Party">Party</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="eventTime" class="form-label">Thời Gian</label>
                <input type="datetime-local" class="form-control" id="eventTime" name="organization_date" required>
            </div>
            <div class="mb-3">
                <label for="eventCapacity" class="form-label">Số Lượng</label>
                <input type="number" class="form-control" id="eventCapacity" name="max_participants" required>
            </div>
            <div class="mb-3">
                <label for="eventFee" class="form-label">Phí</label>
                <input type="number" class="form-control" id="eventFee" name="price" required>
            </div>
            <div class="mb-3">
                <label for="eventPool" class="form-label">Chọn Hồ Bơi</label>
                <select class="form-control" id="eventPool" name="id_pool" required>
                    <!-- Hồ bơi sẽ được lấy từ cơ sở dữ liệu -->
                    @foreach($pools as $pool)
                        <option value="{{ $pool->id_pool }}">{{ $pool->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm Sự Kiện</button>
        </form>
    </div>
@endsection
