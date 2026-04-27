<?php

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('welcome');
});

Route::get('/hello/{name}', function ($name) {
    return "Hello " . $name;
});

Route::resource('users', UserController::class);
