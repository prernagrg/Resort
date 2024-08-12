<?php

use App\Http\Controllers\Admin\Auth\LoginSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

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

    Route::post('logout', [LoginSessionController::class, 'destroy'])
                ->name('adminlogout');
});
