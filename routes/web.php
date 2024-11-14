<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('landing');
});

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/welcome', function () {
    return view('welcome');
}) ->name('welcome');

Route::get('/admin', function () {
    return view('admin.adminDashboard');
});

Route::get('/user', function () {
    return view('user.userDashboard');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', function () {
        // Only accessible by admin users
        return view('admin.adminDashboard');
    });
});

Route::middleware(['role:user'])->group(function () {
    Route::get('/admin', function () {
        // Only accessible by admin users
        return view('user.userDashboard');
    });
});