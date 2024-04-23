<?php

use App\Livewire\CreatePost;
use App\Livewire\Login;
use App\Livewire\Posts;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/posts', Posts::class)->name('posts');
    Route::get('/posts/create', CreatePost::class)->name('posts.create');
    // Route::get('/posts/{id}', ViewPost::class)->name('posts.create');
});

Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');
Route::get('logout', function () {
    auth()->logout();

    return redirect()->route('login');
})->name('logout');
