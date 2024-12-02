<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FolderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view', function () {
    return view('test');
});

Route::get('/view', [fileController::class, 'index'])->name('test');

Route::get('/coba', function () {
    return view('upload');
});

Route::post('/upload', [FileUploadController::class, 'upload'])->name('file.upload');

Route::get('/folder/{id}', [FolderController::class, 'show'])->name('folder.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function () {
    return view('admin.adminDashboard');
}) -> middleware(['auth', 'verified', 'role:admin'])->name('admin');

Route::get('/user', function () {
    return view('user.userDashboard');
}) -> middleware(['auth', 'verified', 'role:user'])->name('user');

require __DIR__.'/auth.php';
