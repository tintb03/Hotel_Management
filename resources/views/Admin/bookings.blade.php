@extends('layouts.dashboard')

@section('content')
    <h1>Quản lý Đặt phòng</h1>

    <!-- Search input field -->
    <div class="mb-3">
        <input type="text" id="booking-search" class="form-control" placeholder="Tìm kiếm...">
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Người đặt</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Mã Phòng</th>
                <th>Tên Khách sạn</th>
                <th>Ảnh phòng</th>
                <th>Message</th>
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
                    <td>{{ $booking->room->hotel->Name_Hotel }}</td>
                    <td><img src="{{ asset('storage/' . $booking->room->image) }}" alt="Room Image" width="100"></td>
                    <td>{{ $booking->message }}</td>
                    <td>{{ $booking->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.bookings.edit', ['booking' => $booking->id]) }}" class="btn btn-primary">Sửa</a>
                        <form action="{{ route('admin.bookings.destroy', ['booking' => $booking->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xoá?')">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        // JavaScript for search functionality
        const searchInput = document.getElementById('booking-search');
        const rows = document.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();

            rows.forEach(row => {
                const bookingData = row.textContent.toLowerCase();
                if (bookingData.includes(searchTerm)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
