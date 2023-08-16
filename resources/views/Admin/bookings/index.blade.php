@extends('layouts.dashboard')

@section('content')
    <h1>Quản lý Đặt phòng</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Người đặt</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Mã Phòng</th>
                <th>Ảnh phòng</th>
                <th>Ngày đặt</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->orderer }}</td>
                    <td>{{ $booking->phone_number }}</td>
                    <td>{{ $booking->email }}</td>
                    <td>{{ $booking->room->room_code }}</td>
                    <td><img src="{{ asset('storage/' . $booking->room->image) }}" alt="Room Image" width="100"></td>
                    <td>{{ $booking->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-primary">Sửa</a>
                        <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xoá đặt phòng này?')">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
