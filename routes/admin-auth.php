<?php

use App\Http\Controllers\Admin\Auth\LoginSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\Configuration\FileCollectionIterator;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('adminregister');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginSessionController::class, 'create'])
                ->name('adminlogin');

    Route::post('login', [LoginSessionController::class, 'store']);


});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('royal-master.Admin.index');
    })->name('admindashboard');
    // Route::get('/create_room', [RoomController::class, 'create'])->name('create_room');
    // Route::post('/create_room', [RoomController::class, 'store'])->name('store_room');
       route::resource('/file', FileController::class);
       route::resource('/room', RoomController::class);
    Route::post('logout', [LoginSessionController::class, 'destroy'])
                ->name('adminlogout');
});
