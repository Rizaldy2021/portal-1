<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\folderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view', function () {
    return view('test');
});

Route::get('/coba', function () {
    return view('upload');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/view', [FileController::class, 'index'])->name('test');

Route::post('/upload', [FileUploadController::class, 'upload'])->name('file.upload');

Route::get('/folder/{id}', [folderController::class, 'show'])->name('folder.show');

Route::get('/folders', [FolderController::class, 'index'])->name('folder.index');

Route::get('/folder/{id}', [FolderController::class, 'show'])->name('folder.show');

Route::get('/files', [FileController::class, 'index'])->name('files.index');

Route::get('/files/{id}/view', [FileController::class, 'view'])->name('files.view');

Route::middleware('auth', 'check.file.access')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('files/{file}', [FileController::class, 'view'])->name('files.view');
});

Route::get('/admin', function () {
    return view('admin.adminDashboard');
}) -> middleware(['auth', 'verified', 'role:admin'])->name('admin');

Route::get('/user', function () {
    return view('user.userDashboard');
}) -> middleware(['auth', 'verified', 'role:user'])->name('user');

require __DIR__.'/auth.php';
