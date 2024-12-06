<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FolderController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/view', function () {
    $files = app(FileController::class)->index(request());
    $folders = app(FolderController::class)->index();
    return view('test', compact('files', 'folders'));
});

Route::get('/coba', function () {
    return view('upload');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/upload', [FileUploadController::class, 'upload'])->name('files.upload');

Route::post('/folders', [FolderController::class, 'store'])->name('folders.store');

Route::middleware('auth')->group(function () {
    Route::get('/files', [FileController::class, 'index'])->name('files.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/files', [FileController::class, 'index'])->name('files.index');
    Route::get('/files/{id}', [FileController::class, 'view'])->name('files.view');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/folders', [FolderController::class, 'index'])->name('folders.index');
    Route::get('/folders/{id}', [FolderController::class, 'show'])->name('folders.show');
});

Route::get('/admin', function () {
    return view('admin.adminDashboard');
}) -> middleware(['auth', 'verified', 'role:admin'])->name('admin');

Route::get('/user', function () {
    return view('user.userDashboard');
}) -> middleware(['auth', 'verified', 'role:user'])->name('user');

require __DIR__.'/auth.php';
