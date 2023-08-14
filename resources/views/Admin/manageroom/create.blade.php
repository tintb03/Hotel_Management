@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h2>Create New Room</h2>
    <form action="{{ route('admin.manageroom.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="room_code">Room Code:</label>
            <input type="text" class="form-control" id="room_code" name="room_code" required>
        </div>
        <div class="form-group">
            <label for="room_number">Room Number:</label>
            <input type="text" class="form-control" id="room_number" name="room_number" required>
        </div>
        <div class="form-group">
            <label for="floor">Floor:</label>
            <input type="text" class="form-control" id="floor" name="floor" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
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
        <div class="form-group">
            <label for="hotel_id">Select Hotel:</label>
            <select class="form-control" id="hotel_id" name="hotel_id" required>
                <option value="">Select Hotel</option>
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->hoteler->name_hoteler }} - {{ $hotel->Name_Hotel }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="type_id">Select Room Type:</label>
            <select class="form-control" id="type_id" name="type_id">
                <option value="">Select Room Type</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name_type }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('admin.manageroom.index') }}" class="btn btn-default">Back</a>
    </form>
</div>

<script>
    document.getElementById("image").addEventListener("change", function (e) {
        var imagePreview = document.getElementById("image-preview");
        var file = e.target.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = "block";
        };

        reader.readAsDataURL(file);
    });
</script>

@endsection
