<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\loginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Homepage'
    ]);
});

Route::get('/login', [loginController::class, 'login']);

Route::get('/about', function(){
    return view('about', [
        'title' => 'About Page',
        'name' => 'Rafael',
        'email' => 'rafze04@gmail.com'
    ]);
});

Route::get('/library', [bookController::class, 'index']);
Route::get('/create-book', [bookController::class, 'createBook']);
Route::POST('/store-book', [bookController::class, 'store']);
Route::get('/display-book/{book:id}', [bookController::class, 'display']);
Route::DELETE('/delete-book/{book:id}', [bookController::class, 'delete']);
Route::get('/edit-book/{book:id}', [bookController::class, 'edit']);
Route::PATCH('/update-book/{book:id}', [bookController::class, 'update']);