<?php

namespace App\Http\Controllers;

use App\Models\ManageRoom;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{


        public function index()
    {
        $bookings = Booking::with('room')->get();
        return view('admin.bookings', compact('bookings'));
    }


    public function create(ManageRoom $room)
    {
        return view('booking.create', compact('room'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'orderer' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'room_id' => 'required|exists:manage_rooms,id',
        ]);

        Booking::create($validatedData);

        return redirect()->route('home')->with('success', 'Đặt phòng thành công!');
    }
}
