@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h2>Manage Rooms</h2>
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search...">
    </div>
    <a href="{{ route('admin.manageroom.create') }}" class="btn btn-primary">Create New Room</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hoteler</th>
                <th>Hotel</th>
                <th>Room Code</th>
                <th>Room Number</th>
                <th>Floor</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Type</th> <!-- Add Type column -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr class="searchable">
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->hotel->hoteler->name_hoteler }}</td>
                    <td>{{ $room->hotel->Name_Hotel }}</td>
                    <td>{{ $room->room_code }}</td>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->floor }}</td>
                    <td>{{ $room->description }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" width="50">
                    </td>
                    <td>{{ $room->price }}</td>
                    <td>
                        @if ($room->type)
                            {{ $room->type->name_type }}
                        @else
                            No Type
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.manageroom.edit', $room->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.manageroom.destroy', $room->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#searchInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $(".searchable").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>

@endsection
