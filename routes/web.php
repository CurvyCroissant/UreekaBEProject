<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\genreController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\registerController;


Route::get('/', function () {
    return view('welcome', [
        'title' => 'PT Meksiko'
    ]);
});


//Book Controller
Route::get('/library', [bookController::class, 'index'])->name('library')->middleware(['auth']);
Route::get('/create-item', [bookController::class, 'createBook'])->middleware(['auth', 'is_admin']);
Route::POST('/store-item', [bookController::class, 'store'])->middleware(['auth', 'is_admin']);
Route::get('/display-item/{book:id}', [bookController::class, 'display'])->middleware(['auth']);
Route::DELETE('/delete-item/{book:id}', [bookController::class, 'delete'])->middleware(['auth', 'is_admin']);
Route::get('/edit-item/{book:id}', [bookController::class, 'edit'])->middleware(['auth', 'is_admin']);
Route::PATCH('/update-item/{book:id}', [bookController::class, 'update'])->middleware(['auth', 'is_admin']);


//Genre Controller
Route::get('/categories', [genreController::class, 'index'])->name('categories')->middleware(['auth']);
Route::get('/create-category', [genreController::class, 'createGenre'])->middleware(['auth', 'is_admin']);
Route::POST('/store-category', [genreController::class, 'store'])->middleware(['auth', 'is_admin']);


//customerController
Route::get('/customer/{customer:id}', [customerController::class, 'display']);


//loginController
Route::get('/login', [loginController::class, 'login'])->name('login')->middleware('guest');
Route::POST('/login', [loginController::class, 'authenticate']);
Route::POST('/logout', [loginController::class, 'logout'])->middleware('auth');


//registerController
Route::get('/register', [registerController::class, 'register'])->middleware('guest');
Route::POST('/register', [registerController::class, 'store']);
