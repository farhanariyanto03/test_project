<?php

use App\Http\Controllers\Admin\BerandaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Author\BerandaController as AuthorBerandaController;
use App\Http\Controllers\Author\PostController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (! Auth::check()) {
        return redirect()->route('login');
    }

    return Auth::user()->role === 'admin'
        ? redirect()->route('admin.beranda')
        : redirect()->route('author.beranda');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
        Route::resource('user', UserController::class);
    });

    Route::middleware('role:author')->prefix('author')->name('author.')->group(function () {
        Route::get('/beranda', [AuthorBerandaController::class, 'index'])->name('beranda');
        Route::resource('post', PostController::class);
    });
});
