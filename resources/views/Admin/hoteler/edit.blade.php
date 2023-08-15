@extends('layouts.dashboard')

@section('content')

<div class="container">
        <h2>Edit Hoteler</h2>
        <form action="{{ route('admin.hoteler.update', $hoteler->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name_hoteler">Name Hoteler:</label>
                <input type="text" class="form-control" id="name_hoteler" name="name_hoteler" value="{{ $hoteler->name_hoteler }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $hoteler->address }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $hoteler->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $hoteler->phone_number }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.main') }}" class="btn btn-default">Back</a> <!-- Nút Back -->
        </form>
    </div>


@endsection