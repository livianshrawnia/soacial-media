<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostInteractionController;


// Registration Routes
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

// Login Routes
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);

// Logout Routes
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
	// Profile Routes
	Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
	Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
	Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

	// Posts Routes
	Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
	Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

	// Feed Routes
	Route::redirect('/', '/feed');
	Route::get('/feed', [FeedController::class, 'index'])->name('feed');

	// Interaction Routes
	Route::post('/posts/{post}/like', [PostInteractionController::class, 'like'])->name('posts.like');
	Route::post('/posts/{post}/dislike', [PostInteractionController::class, 'dislike'])->name('posts.dislike');
	Route::post('/posts/{post}/bookmark', [PostInteractionController::class, 'bookmark'])->name('posts.bookmark');


});
