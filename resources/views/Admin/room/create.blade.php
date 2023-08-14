@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h2>Create New Room</h2>
    <form action="{{ route('admin.room.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="hoteler_id">Hotel:</label>
            <select class="form-control" id="hoteler_id" name="hoteler_id" required>
                <option value="">Select Hotel</option>
                @foreach ($hotelers as $hoteler)
                    <option value="{{ $hoteler->id }}">{{ $hoteler->name_hotel }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="room_code">Room Code:</label>
            <input type="text" class="form-control" id="room_code" name="room_code" required>
        </div>
        <div class="form-group">
            <label for="room_number">Room Number:</label>
            <input type="text" class="form-control" id="room_number" name="room_number" required>
        </div>
        <div class="form-group">
            <label for="kind_of_room">Kind of Room:</label>
            <input type="text" class="form-control" id="kind_of_room" name="kind_of_room" required>
        </div>
        <div class="form-group">
            <label for="floor">Floor:</label>
            <input type="text" class="form-control" id="floor" name="floor" required>
        </div>
        <div class="form-group">
            <label for="detailed_address">Detailed Address:</label>
            <textarea class="form-control" id="detailed_address" name="detailed_address" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <img id="image-preview" src="#" alt="Room Image" width="200" style="display: none;">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('admin.main') }}" class="btn btn-default">Back</a> <!-- Nút Back -->
    </form>
</div>

<script>
    // Lắng nghe sự kiện khi người dùng chọn ảnh
    document.getElementById('image').addEventListener('change', function(e) {
        // Lấy đối tượng hình ảnh
        var image = document.getElementById('image-preview');
        
        // Kiểm tra nếu có tệp được chọn
        if (e.target.files && e.target.files[0]) {
            // Cập nhật thuộc tính src của hình ảnh để hiển thị ảnh đã chọn
            var reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
                image.style.display = 'block'; // Hiển thị hình ảnh
            };
            reader.readAsDataURL(e.target.files[0]);
        } else {
            // Ẩn hình ảnh nếu không có tệp được chọn
            image.style.display = 'none';
        }
    });
</script>

@endsection
