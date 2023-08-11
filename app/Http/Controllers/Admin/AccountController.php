<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller
{
////////////////////////          show + thay đổi password   (myaccount)
    public function show()
    {
        $user = Auth::user();
        return view('admin.account.changemyaccountpassword', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.account.changemyaccountpassword')->with('success', 'Password updated successfully.');
    }
    
/////////////////////////          show all list account
    
    public function showAccountList()
    {
        $accounts = User::all(); // Lấy danh sách tất cả tài khoản

        return view('admin.account.listaccount', compact('accounts'));
    }
////////////////////////       thêm mới tài khoản
        public function createAccount()
    {
        return view('admin.account.createaccount');
    }

    public function storeAccount(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,hoteler,user', // Thêm quy tắc kiểm tra vai trò
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        // Thực hiện các xử lý khác nếu cần

        return redirect()->route('admin.account.list')->with('success', 'Account created successfully');
    }




    ///// sửa tài khoản
        public function editAccount($id)
    {
        $user = User::findOrFail($id);
        return view('admin.account.editaccount', compact('user'));
    }

    public function updateAccount(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,hoteler,user',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.account.list')->with('success', 'Account updated successfully');
    }



    ///// xoá tài khoản
    public function destroyAccount($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.account.list')->with('success', 'Account deleted successfully');
    }


}
