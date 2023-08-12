<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hoteler;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('hoteler')->get();
        return view('admin.room.index', compact('rooms'));
    }

    public function create()
    {
        $hotelers = Hoteler::all();
        return view('admin.room.create', compact('hotelers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hoteler_id' => 'required',
            'room_code' => 'nullable',
            'room_number' => 'required',
            'kind_of_room' => 'required',
            'floor' => 'required',
            'detailed_address' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|numeric',
        ]);

            // Tải lên ảnh và lưu ngoài thư mục public
            $imagePath = $request->file('image')->store('room_images');

        // Create room
        Room::create([
            'hoteler_id' => $request->input('hoteler_id'),
            'room_code' => $request->input('room_code'),
            'room_number' => $request->input('room_number'),
            'kind_of_room' => $request->input('kind_of_room'),
            'floor' => $request->input('floor'),
            'detailed_address' => $request->input('detailed_address'),
            'description' => $request->input('description'),
            'image' => $imagePath,
            'price' => $request->input('price'),
        ]);

        return redirect()->route('admin.room.index')->with('success', 'Room created successfully.');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $hotelers = Hoteler::all();
        return view('admin.room.edit', compact('room', 'hotelers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hoteler_id' => 'required',
            'room_code' => 'nullable',
            'room_number' => 'required',
            'kind_of_room' => 'required',
            'floor' => 'required',
            'detailed_address' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $room = Room::findOrFail($id);
        $room->update([
            'hoteler_id' => $request->input('hoteler_id'),
            'room_code' => $request->input('room_code'),
            'room_number' => $request->input('room_number'),
            'kind_of_room' => $request->input('kind_of_room'),
            'floor' => $request->input('floor'),
            'detailed_address' => $request->input('detailed_address'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('admin.room.index')->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.room.index')->with('success', 'Room deleted successfully.');
    }
}
