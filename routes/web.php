<?php

use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard', ['page' => 'dashboard']);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('meeting')->group(function () {
        Route::get('/', [MeetingController::class, 'index'])->name('meeting.index');
        Route::get('/create', [MeetingController::class, 'create'])->name('meeting.create');
        Route::post('/store', [MeetingController::class, 'store'])->name('meeting.store');
        Route::get('/edit/{id}', [MeetingController::class, 'edit'])->name('meeting.edit');
    });


});

require __DIR__ . '/auth.php';
