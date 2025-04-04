
@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Sửa hồ bơi</h2>
        @php
            $message = Session::get('message');
            if ($message) {
                echo '<div class="alert alert-success">' . $message . '</div>';
                Session::put('message', null);
            }
        @endphp
        <form id="editPoolForm" action="{{ route('pools.update', $pool->id_pool) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="editPoolID">ID</label>
                <input type="text" class="form-control" id="editPoolID" name="id_pool" value="{{ $pool->id_pool }}" readonly>
            </div>

            <div class="mb-3">
                <label for="editPoolImage">Hình ảnh</label>
                <input type="file" class="form-control" id="editPoolImage" name="img">
            </div>

            <div class="mb-3">
                <label for="editPoolName">Tên Hồ Bơi</label>
                <input type="text" class="form-control" id="editPoolName" name="name" required>
            </div>

            <div class="mb-3">
                <label for="editPoolType">Loại Hồ Bơi</label>
                <select class="form-control" id="editPoolType" name="type" required>
                    <option value="Hồ bơi công cộng">Hồ bơi công cộng</option>
                    <option value="Hồ bơi tư nhân">Hồ bơi tư nhân</option>
                    <option value="Hồ bơi trẻ em">Hồ bơi trẻ em</option>
                    <option value="Hồ bơi thi đấu">Hồ bơi thi đấu</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="editHouseNumber">Số Nhà</label>
                <input type="text" class="form-control" id="editHouseNumber" name="house_number" required>
            </div>

            <div class="mb-3">
                <label for="editStreetID">ID Đường</label>
                <input type="text" class="form-control" id="editStreetID" name="id_street" required>
            </div>

            <div class="mb-3">
                <label for="editLatitude">Toạ độ Vĩ độ</label>
                <input type="text" class="form-control" id="editLatitude" name="lat" required>
            </div>

            <div class="mb-3">
                <label for="editLongitude">Toạ độ Kinh độ</label>
                <input type="text" class="form-control" id="editLongitude" name="lng" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>

    </div>
@endsection
