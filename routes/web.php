<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('royal-master.index');
});
Route::get('/about', function () {
    return view('royal-master.about');
});
Route::get('/accomodation', function () {
    return view('royal-master.accomodation');
});
Route::get('/gallery', function () {
    return view('royal-master.gallery');
});
Route::get('/blog', function () {
    return view('royal-master.blog');
});
Route::get('/blog-single', function () {
    return view('royal-master.blog-single');
});
Route::get('/elements', function () {
    return view('royal-master.elements');
});
Route::get('/contact', function () {
    return view('royal-master.contact');
});
Route::get('/admin', function () {
    return view('royal-master.Admin.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
