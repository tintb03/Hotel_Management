<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('home');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $role = $request->input('role');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($role === 'admin' && $user->role !== 'admin') {
                Auth::logout();
                return back()->withErrors(['login_role' => 'Invalid role selected for admin login']);
            }
            
            if ($role === 'hoteler' && $user->role !== 'hoteler') {
                Auth::logout();
                return back()->withErrors(['login_role' => 'Invalid role selected for hoteler login']);
            }
            
            if ($role === 'user' && $user->role !== 'user') {
                Auth::logout();
                return back()->withErrors(['login_role' => 'Invalid role selected for user login']);
            }
            
            // Chuyển hướng đúng theo vai trò sau khi xác thực thành công
            if ($role === 'admin') {
                return redirect()->route('admin.main'); // Chuyển hướng đến trang quản lý admin
            } elseif ($role === 'hoteler') {
                return redirect()->route('hoteler.main'); // Chuyển hướng đến trang quản lý hoteler
            } elseif ($role === 'user') {
                return redirect()->route('user.main'); // Chuyển hướng đến trang quản lý user
            }
        }
        
        return back()->withErrors(['login_role' => 'Invalid credentials']);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'display_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->display_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
