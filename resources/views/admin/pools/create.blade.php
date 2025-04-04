{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
    <h2>Thêm Hồ Bơi</h2>

    <form action="{{ route('pools.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name">Tên Hồ Bơi</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <!-- Các trường khác tương tự như trên -->

        <button type="submit" class="btn btn-primary">Thêm Hồ Bơi</button>
    </form>
</div>
