@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Create New Type Room</h2>
    <form action="{{ route('admin.typeroom.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name_type">Name:</label>
            <input type="text" class="form-control" id="name_type" name="name_type" required>
        </div>
        <div class="form-group">
            <label for="hotel_id">Select Hotel:</label>
            <select class="form-control" id="hotel_id" name="hotel_id" required>
                <option value="">Select Hotel</option>
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->Name_Hotel }} - {{ $hotel->hoteler->name_hoteler }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('admin.typeroom.index') }}" class="btn btn-default">Back</a>
    </form>
</div>
@endsection
