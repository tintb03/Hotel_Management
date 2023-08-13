@extends('layouts.dashboard')

@section('content')

<div class="container">
        <h2>Edit Account</h2>
        <form method="POST" action="{{ route('admin.account.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="hoteler" {{ $user->role === 'hoteler' ? 'selected' : '' }}>Hoteler</option>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Account</button>
            <a href="{{ route('admin.account.list') }}" class="btn btn-default">Back</a> <!-- Nút Back -->
        </form>
    </div>


@endsection