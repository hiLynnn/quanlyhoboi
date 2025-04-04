@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Thêm hồ bơi</h2>
        @php
            $message = Session::get('message');
            if ($message) {
                echo '<div class="alert alert-success">' . $message . '</div>';
                Session::put('message', null);
            }
        @endphp
        <form method="POST" action="{{ route('pools.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="addPoolID">ID</label>
                <input type="text" name="id_pool" class="form-control input-rounded" id="addPoolID" placeholder="ID Hồ Bơi"
                    required>
            </div>

            <div class="form-group">
                <label for="addPoolName">Tên Hồ Bơi</label>
                <input type="text" name="name" class="form-control input-rounded" id="addPoolName"
                    placeholder="Tên Hồ Bơi" required>
            </div>

            <div class="form-group">
                <label for="addPoolImage">Hình ảnh</label>
                <input type="file" name="image" class="form-control input-rounded" id="addPoolImage" required>
            </div>

            <div class="form-group">
                <label for="addPoolType">Loại Hồ Bơi</label>
                <select name="type" class="form-control input-rounded" id="addPoolType" required>
                    <option value="Hồ bơi công cộng">Hồ bơi công cộng</option>
                    <option value="Hồ bơi tư nhân">Hồ bơi tư nhân</option>
                    <option value="Hồ bơi trẻ em">Hồ bơi trẻ em</option>
                    <option value="Hồ bơi thi đấu">Hồ bơi thi đấu</option>
                </select>
            </div>

            <div class="form-group">
                <label for="addHouseNumber">Địa chỉ</label>
                <input type="text" name="house_number" class="form-control input-rounded" id="addHouseNumber"
                    placeholder="Số nhà" required>
                <input type="text" name="id_street" class="form-control input-rounded mt-2" id="addStreetID"
                    placeholder="ID Đường" required>
            </div>

            <div class="form-group">
                <label for="addLatitude">Toạ độ</label>
                <input type="text" name="lat" class="form-control input-rounded" id="addLatitude" placeholder="Vĩ độ"
                    required>
                <input type="text" name="lng" class="form-control input-rounded mt-2" id="addLongitude"
                    placeholder="Kinh độ" required>
            </div>

            <div class="form-group">
                <label for="addPoolSize">Kích thước (m)</label>
                <input type="number" name="length" class="form-control input-rounded" id="addPoolLength" placeholder="Dài"
                    required>
                <input type="number" name="width" class="form-control input-rounded mt-2" id="addPoolWidth"
                    placeholder="Rộng" required>
            </div>

            <div class="form-group">
                <label for="addPoolDepth">Độ sâu (m)</label>
                <input type="number" name="depth" class="form-control input-rounded" id="addPoolDepth" required>
            </div>

            <div class="form-group">
                <label for="addChildrenPrice">Giá vé (VND)</label>
                <input type="number" name="children_price" class="form-control input-rounded" id="addChildrenPrice"
                    placeholder="Trẻ em" required>
                <input type="number" name="adult_price" class="form-control input-rounded mt-2" id="addAdultPrice"
                    placeholder="Người lớn" required>
                <input type="number" name="student_price" class="form-control input-rounded mt-2" id="addStudentPrice"
                    placeholder="Học sinh" required>
            </div>

            <div class="form-group">
                <label for="addOpeningHours">Giờ Mở</label>
                <input type="time" name="opening_hours" class="form-control input-rounded" id="addOpeningHours" required>
            </div>

            <div class="form-group">
                <label for="addClosingHours">Giờ Đóng</label>
                <input type="time" name="close_hours" class="form-control input-rounded" id="addClosingHours"
                    required>
            </div>

            <button type="submit" class="btn btn-success">Thêm</button>
        </form>
    </div>
@endsection
