@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Type Room List</h2>
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search...">
    </div>
    <a href="{{ route('admin.typeroom.create') }}" class="btn btn-primary">Create Type Room</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Hotel</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($typerooms as $typeroom)
            <tr class="searchable">
                <td>{{ $typeroom->id }}</td>
                <td>{{ $typeroom->name_type }}</td>
                <td>{{ $typeroom->hotel->Name_Hotel }} - {{ $typeroom->hotel->hoteler->name_hoteler }}</td>
                <td>
                    <a href="{{ route('admin.typeroom.edit', $typeroom->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.typeroom.destroy', $typeroom->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
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
