@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h2>Rooms</h2>
    <a href="{{ route('admin.room.create') }}" class="btn btn-primary">Add New Room</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hoteler Name</th>
                <th>Hotel Name</th>
                <th>Room Code</th>
                <th>Room Number</th>
                <th>Kind of Room</th>
                <th>Floor</th>
                <th>Detailed Address</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->hoteler ? $room->hoteler->name_hoteler : 'N/A' }}</td>
                <td>{{ $room->hoteler ? $room->hoteler->name_hotel : 'N/A' }}</td>

                <td>{{ $room->room_code }}</td>
                <td>{{ $room->room_number }}</td>
                <td>{{ $room->kind_of_room }}</td>
                <td>{{ $room->floor }}</td>
                <td>{{ $room->detailed_address }}</td>
                <td>{{ $room->description }}</td>
                <td>
                    @if ($room->image)
                        <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" width="50">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $room->price }}</td>
                <td>
                    <a href="{{ route('admin.room.edit', $room->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.room.destroy', $room->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.main') }}" class="btn btn-default">Back</a> <!-- Nút Back -->
</div>



@endsection