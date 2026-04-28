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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

Route::get('/upload', function () {
    return view('upload');
});

Route::post('/upload', function (Request $request) {
    $request->validate([
        'file' => ['required', 'file', 'max:2048'],
    ]);

    $path = $request->file('file')->store('uploads', 's3');

    return back()->with('message', 'アップロード成功: ' . $path);
});
