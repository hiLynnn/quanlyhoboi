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
        <form id="editEventForm" action="{{ route('events.update', $event->id_event) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" id="editEventId" name="id" value="{{ $event->id }}">
            <!-- Hidden field for event ID -->

            <div class="mb-3">
                <label class="form-label">Tên Sự Kiện</label>
                <input type="text" class="form-control" id="editEventName" name="name"
                    value="{{ old('name', $event->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mô Tả</label>
                <input type="text" class="form-control" id="editEventDescription" name="description"
                    value="{{ old('description', $event->description) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Loại Sự Kiện</label>
                <select class="form-control" id="editEventType" name="type" required>
                    <option value="Thể Thao" {{ $event->type == 'Thể Thao' ? 'selected' : '' }}>Thể Thao</option>
                    <option value="Giáo dục" {{ $event->type == 'Giáo dục' ? 'selected' : '' }}>Giáo dục</option>
                    <option value="Party" {{ $event->type == 'Party' ? 'selected' : '' }}>Party</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Thời Gian</label>
                <input type="datetime-local" class="form-control" id="editEventTime" name="organization_date"
                    value="{{ old('organization_date', \Carbon\Carbon::parse($event->organization_date)->format('Y-m-d\TH:i')) }}"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label">Số Lượng</label>
                <input type="number" class="form-control" id="editEventCapacity" name="max_participants"
                    value="{{ old('max_participants', $event->max_participants) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phí</label>
                <input type="number" class="form-control" id="editEventFee" name="price"
                    value="{{ old('price', $event->price) }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Cập Nhật Sự Kiện</button>
        </form>
    </div>
@endsection
