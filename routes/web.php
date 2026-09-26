<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::prefix('/')->group(function () {
//     Route::view('/', 'news.index')->name('home');
//     Route::view('/contact', 'news.contact')->name('contact');
//     Route::view('/all-news', 'news.all-news')->name('all-news');
// });

Route::prefix('cms/admin')->group(function () {
    Route::view('/','cms.dashboard');
    Route::resource('/cities',CityController::class);
    Route::resource('/categories',CityController::class);
    });
