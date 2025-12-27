<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function (Request $request) {
    // versi simpel: validasi minimal
    $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email'],
        'message' => ['required', 'string', 'max:2000'],
    ]);

    // TODO: kirim email / simpan ke DB kalau mau
    return back()->with('ok', 'Pesan kamu sudah terkirim (simulasi).');
})->name('contact.submit');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
