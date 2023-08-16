@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h2>Hoteler List</h2>
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search...">
    </div>
    <a href="{{ route('admin.hoteler.create') }}" class="btn btn-primary">Create Hoteler</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name Hoteler</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotelers as $hoteler)
                <tr class="searchable">
                    <td>{{ $hoteler->name_hoteler }}</td>
                    <td>{{ $hoteler->address }}</td>
                    <td>{{ $hoteler->email }}</td>
                    <td>{{ $hoteler->phone_number }}</td>
                    <td>
                        <a href="{{ route('admin.hoteler.edit', $hoteler->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.hoteler.destroy', $hoteler->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this hoteler?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.main') }}" class="btn btn-default">Back</a> <!-- Back button -->
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
