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

// Public Blog Routes
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $postsCount = \App\Models\Post::where('user_id', auth()->id())->count();
        $usersCount = \App\Models\User::count();
        return view('dashboard', compact('postsCount', 'usersCount'));
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Blog Admin Routes
    Route::resource('dashboard/posts', App\Http\Controllers\PostController::class)
        ->names('dashboard.posts');
});

require __DIR__.'/auth.php';
