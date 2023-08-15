<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hoteler;

class HotelerController extends Controller
{

    ////////////////////////          show hoteler
    public function index()
    {
        $hotelers = Hoteler::all();
        return view('admin.hoteler.index', compact('hotelers'));
    }



    ////////////////////////       thêm mới hoteler
    public function create()
    {
        return view('admin.hoteler.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_hoteler' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:hotelers',
            'phone_number' => 'required|string|max:20',
        ]);

        Hoteler::create([
            'name_hoteler' => $request->name_hoteler,
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('admin.hoteler.index')->with('success', 'Hoteler created successfully.');
    }



      ///// sửa thông tin hoteler  
    public function edit($id)
    {
        $hoteler = Hoteler::find($id);
        return view('admin.hoteler.edit', compact('hoteler'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_hoteler' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:hotelers,email,' . $id,
            'phone_number' => 'required|string|max:20',
        ]);

        $hoteler = Hoteler::find($id);
        $hoteler->update([
            'name_hoteler' => $request->name_hoteler,
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('admin.hoteler.index')->with('success', 'Hoteler updated successfully.');
    }



//////// xoá hoteler
    public function destroy($id)
    {
        $hoteler = Hoteler::find($id);
        $hoteler->delete();

        return redirect()->route('admin.hoteler.index')->with('success', 'Hoteler deleted successfully.');
    }
}
