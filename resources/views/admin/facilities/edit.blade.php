@extends('layout_admin')
@section('content')
<div class="container mt-5">
    <h2>Sửa tiện ích</h2>
    @php
        $message = Session::get('message');
        if ($message) {
            echo '<div class="alert alert-success">' . $message . '</div>';
            Session::put('message', null);
        }
    @endphp
    <form id="editServiceForm" action="{{ route('facilities.update', $poolUtility->id_pu) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="editServiceId" class="form-label">Chọn Tiện ích</label>
            <select class="form-control" id="editServiceId" name="id_utility" required>
                <option value="">Chọn Tiện ích</option>
                @foreach($utilities as $utility)
                    <option value="{{ $utility->id_utility }}"
                        {{ $utility->id_utility == $poolUtility->id_utility ? 'selected' : '' }}>
                        {{ $utility->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
