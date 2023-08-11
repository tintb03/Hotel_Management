<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AccountController;


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


Route::middleware(['auth'])->prefix('admin')->group(function () {

// quản lý tài khoản //
    Route::get('/account', [AccountController::class, 'show'])->name('admin.account.changemyaccountpassword');                                       //show myaccount
    Route::post('/account/update-password', [AccountController::class, 'updatePassword'])->name('admin.account.updatePassword');                  //update password
    Route::get('/account/list', [AccountController::class, 'showAccountList'])->name('admin.account.list');                                       //show listaccount
    Route::get('/account/create', [AccountController::class, 'createAccount'])->name('admin.account.create');                               //thêm mới tài khoản
    Route::post('/account/store', [AccountController::class, 'storeAccount'])->name('admin.account.store');                                 //thêm mới tài khoản
    Route::get('/account/edit/{id}', [AccountController::class, 'editAccount'])->name('admin.account.edit');                                          //sửa tài khoản
    Route::put('/account/update/{id}', [AccountController::class, 'updateAccount'])->name('admin.account.update');                                    //sửa tài khoản
    Route::delete('/account/destroy/{id}', [AccountController::class, 'destroyAccount'])->name('admin.account.destroy');                   //xoá tài khoản
});


