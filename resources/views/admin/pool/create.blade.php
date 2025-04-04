<!-- resources/views/admin/modals/pool-modal.blade.php -->
<!-- Modal Thêm Hồ Bơi -->
<div class="modal fade" id="addPoolModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm Hồ Bơi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Form gửi dữ liệu qua POST -->
                <form action="{{ route('quan-ly-ho-boi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Tên Hồ Bơi</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="house_number">Số Nhà</label>
                        <input type="text" class="form-control" name="house_number" id="house_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_street">ID Đường</label>
                        <input type="text" class="form-control" name="id_street" id="id_street" required>
                    </div>
                    <div class="mb-3">
                        <label for="lat">Vĩ độ</label>
                        <input type="number" class="form-control" name="lat" id="lat" step="any" required>
                    </div>
                    <div class="mb-3">
                        <label for="lng">Kinh độ</label>
                        <input type="number" class="form-control" name="lng" id="lng" step="any" required>
                    </div>
                    <div class="mb-3">
                        <label for="length">Chiều dài</label>
                        <input type="number" class="form-control" name="length" id="length" required>
                    </div>
                    <div class="mb-3">
                        <label for="width">Chiều rộng</label>
                        <input type="number" class="form-control" name="width" id="width" required>
                    </div>
                    <div class="mb-3">
                        <label for="depth">Độ sâu</label>
                        <input type="text" class="form-control" name="depth" id="depth" required>
                    </div>
                    <div class="mb-3">
                        <label for="type">Loại Hồ Bơi</label>
                        <input type="text" class="form-control" name="type" id="type" required>
                    </div>
                    <div class="mb-3">
                        <label for="opening_hours">Giờ Mở</label>
                        <input type="time" class="form-control" name="opening_hours" id="opening_hours" required>
                    </div>
                    <div class="mb-3">
                        <label for="close_hours">Giờ Đóng</label>
                        <input type="time" class="form-control" name="close_hours" id="close_hours" required>
                    </div>
                    <div class="mb-3">
                        <label for="img">Ảnh Hồ Bơi</label>
                        <input type="file" class="form-control" name="img" id="img" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="children_price">Giá Trẻ Em</label>
                        <input type="number" class="form-control" name="children_price" id="children_price" required>
                    </div>
                    <div class="mb-3">
                        <label for="adult_price">Giá Người Lớn</label>
                        <input type="number" class="form-control" name="adult_price" id="adult_price" required>
                    </div>
                    <div class="mb-3">
                        <label for="student_price">Giá Học Sinh</label>
                        <input type="number" class="form-control" name="student_price" id="student_price" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm Hồ Bơi</button>
                </form>
            </div>
        </div>
    </div>
</div>
