<?php

use App\Models\UploadFile;
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

Route::get('/upload', function () {
    return view('upload');
});

Route::post('/upload', function (Request $request) {
    $request->validate([
        'file' => ['required', 'file', 'max:2048'],
    ]);

    $file = $request->file('file');

    $path = $file->store('uploads', 's3');

    UploadFile::create([
        'original_name' => $file->getClientOriginalName(),
        'path' => $path,
        'mime_type' => $file->getMimeType(),
        'size' => $file->getSize(),
    ]);

    return redirect('/upload/files');
});

Route::get('/upload/files', function () {
    $files = UploadFile::latest()->get();

    return view('upload-files', compact('files'));
});
