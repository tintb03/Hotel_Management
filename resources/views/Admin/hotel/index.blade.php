@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h2>Hotels</h2>
    <div class="form-group">
        <input type="text" id="searchInput" class="form-control" placeholder="Search...">
    </div>
    <a href="{{ route('admin.hotel.create') }}" class="btn btn-primary">Add New Hotel</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hoteler Name</th>
                <th>Name Hotel</th>
                <th>Detailed Address</th>
                <th>Number of Rooms</th>
                <th>Number of Floors</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
            <tr class="searchable">
                <td>{{ $hotel->id }}</td>
                <td>{{ $hotel->hoteler ? $hotel->hoteler->name_hoteler : 'N/A' }}</td>
                <td>{{ $hotel->Name_Hotel }}</td>
                <td>{{ $hotel->detailed_address }}</td>
                <td>{{ $hotel->Number_of_rooms }}</td>
                <td>{{ $hotel->Number_of_floors }}</td>
                <td>
                    <a href="{{ route('admin.hotel.edit', $hotel->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.hotel.destroy', $hotel->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this hotel?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.main') }}" class="btn btn-default">Back</a>
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
