@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Xác nhận phiếu đăng ký</h2>
        @php
            $message = Session::get('message');
            if ($message) {
                echo '<div class="alert alert-success">' . $message . '</div>';
                Session::put('message', null);
            }
        @endphp
        <form id="editEventForm" action="{{ route('registrations.update', $registration->id_ER) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" id="editEventId" name="id" value="{{ $registration->id_ER }}">

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-control" id="editEventType" name="status" required>
                    <option value="pending" {{ $registration->status == 'pending' ? 'selected' : '' }}>Chưa giải quyết</option>
                    <option value="confirmed" {{ $registration->status == 'confirmed' ? 'selected' : '' }}>Duyệt</option>
                    <option value="rejected" {{ $registration->status == 'rejected' ? 'selected' : '' }}>Từ chối</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Xác nhận trạng thái</button>
        </form>
    </div>
@endsection
