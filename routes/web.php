<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/welcome', function () {
    return view('welcome');
}) ->name('welcome');

Route::get('/admin', function () {
    return view('admin.adminDashboard');
});

Route::get('/user', function () {
    return view('user.userDashboard');
});