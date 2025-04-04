@extends('layout_admin')
@section('content')
    <div class="container mt-5">
        <h2>Thêm tiện ích</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="addUtilityForm" action="{{ route('facilities.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="idUtility" class="form-label">Chọn Tiện ích</label>
                <select class="form-control" id="idUtility" name="id_utility" required>
                    <option value="">-- Chọn Tiện ích --</option>
                    @foreach($utilities as $utility)
                        <option value="{{ $utility->id_utility }}">{{ $utility->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="poolId" class="form-label">Chọn Hồ Bơi</label>
                <select class="form-control" id="poolId" name="pool_id" required>
                    <option value="">-- Chọn Hồ Bơi --</option>
                    @foreach($pools as $pool)
                        <option value="{{ $pool->id_pool }}">{{ $pool->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Thêm Tiện ích</button>
        </form>
    </div>
@endsection
