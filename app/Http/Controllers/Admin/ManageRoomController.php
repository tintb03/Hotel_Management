<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManageRoom;
use App\Models\Hotel;
use App\Models\TypeRoom;
use Illuminate\Support\Facades\Storage; // Import Storage class for image deletion

class ManageRoomController extends Controller
{
    public function index()
    {
        $rooms = ManageRoom::with(['hotel', 'type'])->get(); // Include 'type' relationship
        return view('admin.manageroom.index', compact('rooms'));
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'room_id');
    }

    public function create()
    {
        $hotels = Hotel::all();
        $types = TypeRoom::all(); // Lấy danh sách loại phòng từ Model TypeRoom
        return view('admin.manageroom.create', compact('hotels', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_code' => 'required|string|max:255',
            'room_number' => 'required|string|max:255',
            'floor' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation rules
            'price' => 'required|numeric',
            'hotel_id' => 'required|exists:hotels,id',
            'type_id' => 'nullable|exists:type_rooms,id', // Validation for type_id
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('room_images', 'public');
        }

        ManageRoom::create([
            'room_code' => $request->room_code,
            'room_number' => $request->room_number,
            'floor' => $request->floor,
            'description' => $request->description,
            'image' => $imagePath,
            'price' => $request->price,
            'hotel_id' => $request->hotel_id,
            'type_id' => $request->type_id, // Store type_id
        ]);

        return redirect()->route('admin.manageroom.index')->with('success', 'Room created successfully.');
    }

    public function edit($id)
    {
        $room = ManageRoom::find($id);
        $hotels = Hotel::all();
        $types = TypeRoom::all(); // Lấy danh sách loại phòng từ Model TypeRoom
        return view('admin.manageroom.edit', compact('room', 'hotels', 'types'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'room_code' => 'required|string|max:255',
            'room_number' => 'required|string|max:255',
            'floor' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation rules
            'price' => 'required|numeric',
            'hotel_id' => 'required|exists:hotels,id',
            'type_id' => 'nullable|exists:type_rooms,id', // Validation for type_id
        ]);

        $room = ManageRoom::find($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('room_images', 'public');
            $room->image = $imagePath;
        }

        $room->update([
            'room_code' => $request->room_code,
            'room_number' => $request->room_number,
            'floor' => $request->floor,
            'description' => $request->description,
            'price' => $request->price,
            'hotel_id' => $request->hotel_id,
            'type_id' => $request->type_id, // Update type_id
        ]);

        return redirect()->route('admin.manageroom.index')->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        $room = ManageRoom::find($id);

        if ($room->image) {
            // Delete image file if exists
            Storage::disk('public')->delete($room->image);
        }

        $room->delete();

        return redirect()->route('admin.manageroom.index')->with('success', 'Room deleted successfully.');
    }
}
