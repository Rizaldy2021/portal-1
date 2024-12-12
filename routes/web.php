<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\Auth\AddUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view', function () {
    $files = app(FileController::class)->index(request());
    $folders = app(FolderController::class)->index();
    return view('test', compact('files', 'folders'));
})->name('view');

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

Route::get('/files', [FileController::class, 'index'])->name('files.index');
Route::middleware('auth', 'check.file.acceess')->group(function () {
    Route::get('/files/{id}', [FileController::class, 'view'])->name('files.view');
});



Route::get('/folders', [FolderController::class, 'index'])->name('folders.index');
Route::middleware(['auth', 'check.folder.access'])->group(function () {
    Route::get('/folders/{id}', [FolderController::class, 'show'])->name('folders.show');
});

Route::get('/admin', function () {
    $files = app(FileController::class)->index(request());
    $folders = app(FolderController::class)->index();
    return view('admin.adminDashboard', compact('files', 'folders'));
}) -> middleware(['auth', 'verified', 'role:admin'])->name('admin');

Route::get('/user/{name}', function () {
    $files = app(FileController::class)->index(request());
    $folders = app(FolderController::class)->index();
    return view('user.userDashboard', compact('files', 'folders'));
}) -> middleware(['auth', 'verified', 'role:user'])->name('user');

require __DIR__.'/auth.php';
