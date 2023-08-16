@extends('layouts.dashboard')

@section('content')
    <h1>Sửa Đặt phòng</h1>
    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Form fields for editing booking details -->
        <!-- Example: -->
        <div class="form-group">
            <label for="orderer">Người đặt</label>
            <input type="text" name="orderer" id="orderer" class="form-control" value="{{ $booking->orderer }}" required>
        </div>
        <!-- Other form fields -->
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    </form>
@endsection
