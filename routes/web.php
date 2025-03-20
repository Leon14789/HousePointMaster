<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [RoomController::class, 'ranking'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/Class', [RoomController::class, 'index'])->name('Class');
    
    Route::get('/RegisterClass', [RoomController::class, 'create'])->name('RegisterClass');
    Route::post('/RegisterClass', [RoomController::class, 'store']);
    
    Route::put('/UpdateClass/{room}', [RoomController::class, 'update'])->name('UpdateClass');

    Route::post('/DestroyClass/{room}', [RoomController::class, 'destroy'])->name('DestroyClass');


});

require __DIR__.'/auth.php';
