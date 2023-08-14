@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h2>Edit Hotel</h2>
    <form action="{{ route('admin.hotel.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="hoteler_id">Hoteler:</label>
            <select class="form-control" id="hoteler_id" name="hoteler_id" required>
                @foreach ($hotelers as $hoteler)
                    <option value="{{ $hoteler->id }}" {{ $hotel->hoteler_id == $hoteler->id ? 'selected' : '' }}>{{ $hoteler->name_hoteler }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Name_Hotel">Name Hotel:</label>
            <input type="text" class="form-control" id="Name_Hotel" name="Name_Hotel" value="{{ $hotel->Name_Hotel }}" required>
        </div>
        <div class="form-group">
            <label for="detailed_address">Detailed Address:</label>
            <input type="text" class="form-control" id="detailed_address" name="detailed_address" value="{{ $hotel->detailed_address }}" required>
        </div>
        <div class="form-group">
            <label for="Number_of_rooms">Number of Rooms:</label>
            <input type="number" class="form-control" id="Number_of_rooms" name="Number_of_rooms" value="{{ $hotel->Number_of_rooms }}" required>
        </div>
        <div class="form-group">
            <label for="Number_of_floors">Number of Floors:</label>
            <input type="number" class="form-control" id="Number_of_floors" name="Number_of_floors" value="{{ $hotel->Number_of_floors }}" required>
        </div>
        <!-- ... Các trường khác -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.hotel.index') }}" class="btn btn-default">Back</a>
    </form>
</div>

@endsection
