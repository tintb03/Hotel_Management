<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('home');
});

// Đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Đăng ký
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Đăng xuất
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route cho người dùng đã đăng nhập
Route::middleware(['auth'])->group(function () {
    // Đường dẫn chung cho người dùng đăng nhập
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Đường dẫn cụ thể cho từng vai trò
    Route::get('/user/main', function () {
        return view('User.main');
    })->name('user.main');

    Route::get('/hoteler/main', function () {
        return view('Hoteler.main');
    })->name('hoteler.main');

    Route::get('/admin/main', function () {
        return view('Admin.main');
    })->name('admin.main');
});
