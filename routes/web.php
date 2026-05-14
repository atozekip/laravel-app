<?php

use App\Models\UploadFile;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

Route::middleware('auth')->group(function () {
    Route::get('/upload', [UploadFileController::class, 'create']);
    Route::post('/upload', [UploadFileController::class, 'store']);
    Route::get('/upload/files', [UploadFileController::class, 'index']);
    Route::delete('/upload/files/{file}', [UploadFileController::class, 'destroy']);
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
