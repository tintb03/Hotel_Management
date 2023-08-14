<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TypeRoom;
use App\Models\Hotel;

class TypeRoomController extends Controller
{
    public function index()
    {
        $typerooms = TypeRoom::with('hotel')->get();
        return view('admin.typeroom.index', compact('typerooms'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        return view('admin.typeroom.create', compact('hotels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required',
            'name_type' => 'required|string|max:255',
            // ... Validate other fields
        ]);

        TypeRoom::create([
            'hotel_id' => $request->hotel_id,
            'name_type' => $request->name_type,
            // ... Set other fields
        ]);

        return redirect()->route('admin.typeroom.index')->with('success', 'Type Room created successfully.');
    }

    public function edit($id)
    {
        $typeroom = TypeRoom::find($id);
        $hotels = Hotel::all();
        return view('admin.typeroom.edit', compact('typeroom', 'hotels'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_type' => 'required|string|max:255',
            // ... Validate other columns
        ]);

        $typeroom = TypeRoom::find($id);
        $typeroom->update($request->all());

        return redirect()->route('admin.typeroom.index')->with('success', 'Type Room updated successfully.');
    }

    public function destroy($id)
    {
        $typeroom = TypeRoom::find($id);
        $typeroom->delete();

        return redirect()->route('admin.typeroom.index')->with('success', 'Type Room deleted successfully.');
    }
}
