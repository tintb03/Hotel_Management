<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\HotelerController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\RoomController;


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

// quản lý hoteler
Route::prefix('admin/hoteler')->group(function () {
    Route::get('/', [HotelerController::class, 'index'])->name('admin.hoteler.index');                                                            //show all hoteler
    Route::get('/create', [HotelerController::class, 'create'])->name('admin.hoteler.create');                                           //thêm mới hoteler  
    Route::post('/store', [HotelerController::class, 'store'])->name('admin.hoteler.store');                                             //thêm mới hoteler  
    Route::get('/edit/{id}', [HotelerController::class, 'edit'])->name('admin.hoteler.edit');                                                     //sửa thông tin hoteler  
    Route::put('/update/{id}', [HotelerController::class, 'update'])->name('admin.hoteler.update');                                               //sửa thông tin hoteler    
    Route::delete('/delete/{id}', [HotelerController::class, 'destroy'])->name('admin.hoteler.destroy');                                 //xoá hoteler
});


Route::prefix('admin')->group(function () {
    Route::get('/room/create', [RoomController::class, 'create'])->name('admin.room.create');
    Route::post('/room', [RoomController::class, 'store'])->name('admin.room.store');
    Route::get('/room/{id}/edit', [RoomController::class, 'edit'])->name('admin.room.edit');
    Route::put('/room/{id}', [RoomController::class, 'update'])->name('admin.room.update');
    Route::delete('/room/{id}', [RoomController::class, 'destroy'])->name('admin.room.destroy');
    Route::get('/room', [RoomController::class, 'index'])->name('admin.room.index');
});

 // Quản lý khách sạn
 Route::prefix('admin/hotel')->group(function () {
    Route::get('/', [HotelController::class, 'index'])->name('admin.hotel.index');
    Route::get('/create', [HotelController::class, 'create'])->name('admin.hotel.create');
    Route::post('/store', [HotelController::class, 'store'])->name('admin.hotel.store');
    Route::get('/edit/{id}', [HotelController::class, 'edit'])->name('admin.hotel.edit');
    Route::put('/update/{id}', [HotelController::class, 'update'])->name('admin.hotel.update');
    Route::delete('/delete/{id}', [HotelController::class, 'destroy'])->name('admin.hotel.destroy');
});