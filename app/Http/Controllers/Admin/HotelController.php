<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hoteler;
use App\Models\Hotel;
use App\Models\Room;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('hoteler')->get();
        $hotelers = Hoteler::all(); // Định nghĩa biến $hotelers
        return view('admin.hotel.index', compact('hotels', 'hotelers'));
    }

    public function create()
    {
        $hotelers = Hoteler::all();
        return view('admin.hotel.create', compact('hotelers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'hoteler_id' => 'required',
            'Name_Hotel' => 'required|string|max:255',
            'detailed_address' => 'required|string', // Thêm validate cho trường detailed_address
            'Number_of_rooms' => 'required|integer',
            'Number_of_floors' => 'required|integer',
            // ... Validate các cột khác
        ]);

        Hotel::create($request->all());

        return redirect()->route('admin.hotel.index')->with('success', 'Hotel created successfully.');
    }

    public function edit($id)
    {
        $hotel = Hotel::with('hoteler')->find($id); // Sử dụng with('hoteler') để lấy thông tin về hoteler liên quan
        $hotelers = Hoteler::all();
        return view('admin.hotel.edit', compact('hotel', 'hotelers'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hoteler_id' => 'required',
            'Name_Hotel' => 'required|string|max:255',
            'detailed_address' => 'required|string', // Thêm validate cho trường detailed_address
            'Number_of_rooms' => 'required|integer',
            'Number_of_floors' => 'required|integer',
            // ... Validate các cột khác
        ]);
    
        $hotel = Hotel::find($id);
        $hotel->update([
            'hoteler_id' => $request->hoteler_id,
            'Name_Hotel' => $request->Name_Hotel,
            'detailed_address' => $request->detailed_address, // Cập nhật trường detailed_address
            'Number_of_rooms' => $request->Number_of_rooms,
            'Number_of_floors' => $request->Number_of_floors,
            // ... Cập nhật các cột khác
        ]);
    
        return redirect()->route('admin.hotel.index')->with('success', 'Hotel updated successfully.');
    }
    

    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();

        return redirect()->route('admin.hotel.index')->with('success', 'Hotel deleted successfully.');
    }
}
