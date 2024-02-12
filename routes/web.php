<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\cartController;


Route::get('/', function () {
    return view('welcome', [
        'title' => 'PT Meksiko'
    ]);
})->name('home');


//Item Controller
Route::get('/library', [itemController::class, 'index'])->name('library')->middleware(['auth']);
Route::get('/create-item', [itemController::class, 'createItem'])->middleware(['auth', 'is_admin']);
Route::POST('/store-item', [itemController::class, 'store'])->middleware(['auth', 'is_admin']);
Route::get('/display-item/{item:id}', [itemController::class, 'display'])->middleware(['auth']);
Route::DELETE('/delete-item/{item:id}', [itemController::class, 'delete'])->middleware(['auth', 'is_admin']);
Route::get('/edit-item/{item:id}', [itemController::class, 'edit'])->middleware(['auth', 'is_admin']);
Route::PATCH('/update-item/{item:id}', [itemController::class, 'update'])->middleware(['auth', 'is_admin']);


//Category Controller
Route::get('/categories', [categoryController::class, 'index'])->name('categories')->middleware(['auth']);
Route::get('/create-category', [categoryController::class, 'createCategory'])->middleware(['auth', 'is_admin']);
Route::POST('/store-category', [categoryController::class, 'store'])->middleware(['auth', 'is_admin']);


//Login Controller
Route::get('/login', [loginController::class, 'login'])->name('login')->middleware('guest');
Route::POST('/login', [loginController::class, 'authenticate']);
Route::POST('/logout', [loginController::class, 'logout'])->middleware('auth');


//Register Controller
Route::get('/register', [registerController::class, 'register'])->middleware('guest');
Route::POST('/register', [registerController::class, 'store']);


//Cart Controller
Route::post('/cart/{cart:id}/add', [cartController::class, 'store'])->middleware('auth')->name('cart.store');
Route::get('/cart/{cart:id}', [cartController::class, 'display'])->middleware('auth')->name('cart.display');


// Invoice Controller
Route::get('/create-invoice/{invoice:id}', [invoiceController::class, 'createInvoice'])->middleware('auth')->name('invoice.create');
Route::post('/store-invoice/{invoice:id}', [invoiceController::class, 'store'])->middleware('auth');
Route::get('/display-invoice/{invoice:id}', [invoiceController::class, 'display'])->middleware('auth');

