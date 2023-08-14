@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h2>Edit Room</h2>
    <form action="{{ route('admin.manageroom.update', $room->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="room_code">Room Code:</label>
            <input type="text" class="form-control" id="room_code" name="room_code" value="{{ $room->room_code }}" required>
        </div>
        <div class="form-group">
            <label for="room_number">Room Number:</label>
            <input type="text" class="form-control" id="room_number" name="room_number" value="{{ $room->room_number }}" required>
        </div>
        <div class="form-group">
            <label for="floor">Floor:</label>
            <input type="text" class="form-control" id="floor" name="floor" value="{{ $room->floor }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $room->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            @if ($room->image)
            <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" width="200">
            @endif
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $room->price }}" required>
        </div>
        <div class="form-group">
            <label for="hotel_id">Select Hotel:</label>
            <select class="form-control" id="hotel_id" name="hotel_id" required>
                <option value="">Select Hotel</option>
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}" {{ $room->hotel_id == $hotel->id ? 'selected' : '' }}>{{ $hotel->Name_Hotel }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.manageroom.index') }}" class="btn btn-default">Back</a>
    </form>
</div>

<script>
    document.getElementById("image").addEventListener("change", function (e) {
        var imagePreview = document.getElementById("image-preview");
        var file = e.target.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            if (imagePreview.src) {
                URL.revokeObjectURL(imagePreview.src); // Release previous object URL
            }
            imagePreview.src = e.target.result;
            imagePreview.style.display = "block";
        };

        reader.readAsDataURL(file);
    });
</script>

@endsection
