
<div class="container">
    <h2>Edit Room</h2>
    <form action="{{ route('admin.room.update', $room->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="hoteler_id">Hotel:</label>
            <select class="form-control" id="hoteler_id" name="hoteler_id" required>
                <option value="">Select Hotel</option>
                @foreach ($hotelers as $hoteler)
                    <option value="{{ $hoteler->id }}" {{ $room->hoteler_id == $hoteler->id ? 'selected' : '' }}>
                        {{ $hoteler->name_hotel }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="room_code">Room Code:</label>
            <input type="text" class="form-control" id="room_code" name="room_code" value="{{ $room->room_code }}" required>
        </div>

        <div class="form-group">
            <label for="room_number">Room Number:</label>
            <input type="text" class="form-control" id="room_number" name="room_number" value="{{ $room->room_number }}" required>
        </div>

        <div class="form-group">
            <label for="kind_of_room">Kind of Room:</label>
            <input type="text" class="form-control" id="kind_of_room" name="kind_of_room" value="{{ $room->kind_of_room }}" required>
        </div>

        <div class="form-group">
            <label for="floor">Floor:</label>
            <input type="text" class="form-control" id="floor" name="floor" value="{{ $room->floor }}" required>
        </div>

        <div class="form-group">
            <label for="detailed_address">Detailed Address:</label>
            <textarea class="form-control" id="detailed_address" name="detailed_address" rows="3" required>{{ $room->detailed_address }}</textarea>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $room->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $room->price }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.room.index') }}" class="btn btn-default">Back</a> <!-- Nút Back -->
    </form>
</div>

