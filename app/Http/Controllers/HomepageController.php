<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManageRoom;

class HomepageController extends Controller
{
    public function index()
    {
        $rooms = ManageRoom::with('hotel')->get(); // Lấy danh sách các phòng cùng với thông tin khách sạn
        return view('home', compact('rooms'));
    }
}
