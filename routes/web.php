<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\genreController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\registerController;


Route::get('/', function () {
    return view('welcome', [
        'title' => 'Home Page'
    ]);
});


//Book Controller
Route::get('/library', [bookController::class, 'index'])->name('library')->middleware('auth');
Route::get('/create-book', [bookController::class, 'createBook']);
Route::POST('/store-book', [bookController::class, 'store']);
Route::get('/display-book/{book:id}', [bookController::class, 'display']);
Route::DELETE('/delete-book/{book:id}', [bookController::class, 'delete']);
Route::get('/edit-book/{book:id}', [bookController::class, 'edit']);
Route::PATCH('/update-book/{book:id}', [bookController::class, 'update']);


//Genre Controller
Route::get('/genres', [genreController::class, 'index'])->middleware('is_admin');
Route::get('/create-genre', [genreController::class, 'createGenre'])->middleware('is_admin');
Route::POST('/store-genre', [genreController::class, 'store'])->middleware('is_admin');


//customerController
Route::get('/customer/{customer:id}', [customerController::class, 'display']);


//loginController
Route::get('/login', [loginController::class, 'login'])->name('login')->middleware('guest');
Route::POST('/login', [loginController::class, 'authenticate']);
Route::POST('/logout', [loginController::class, 'logout'])->middleware('auth');


//registerController
Route::get('/register', [registerController::class, 'register'])->middleware('guest');
Route::POST('/register', [registerController::class, 'store']);
