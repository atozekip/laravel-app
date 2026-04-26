<?php

use App\Models\User;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('welcome');
});

Route::get('/hello/{name}', function ($name) {
    return "Hello " . $name;
});

Route::get('/users', function () {
    $users = User::all();
    return view('users', compact('users'));
});

Route::get('/users/create', function () {
    return view('user-create');
});

Route::post('/users', function (Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'max:255'],
        'email' => ['required', 'email', 'unique:users,email'],
    ]);

    $user = new User();
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->password = bcrypt('password');
    $user->save();

    return redirect('/users');
});

Route::get('/users/{user}/edit', function (User $user) {
    return view('user-edit', compact('user'));
});

Route::put('/users/{user}', function (Illuminate\Http\Request $request, User $user) {
    $validated = $request->validate([
        'name' => ['required', 'max:255'],
        'email' => ['required', 'email', 'unique:users,email,' . $user->id],
    ]);

    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->save();

    return redirect('/users');
});

Route::delete('/users/{user}', function (User $user) {
    $user->delete();

    return redirect('/users');
});
