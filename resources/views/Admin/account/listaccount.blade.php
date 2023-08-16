@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h2>Account List</h2>
    <a href="{{ route('admin.account.create') }}" class="btn btn-primary">Create Account</a>

    <!-- Search form -->
    <div class="form-group mt-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search by Name or Email">
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr class="searchable">
                    <td>{{ $account->name }}</td>
                    <td>{{ $account->email }}</td>
                    <td>{{ $account->role }}</td>
                    <td>{{ $account->created_at }}</td>
                    <td>{{ $account->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.account.edit', $account->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.account.destroy', $account->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this account?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.main') }}" class="btn btn-default">Back</a> <!-- Nút Back -->
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
