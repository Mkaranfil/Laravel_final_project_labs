<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/homeSite', function () {
    return view('frontend/pages/home');
});
Route::get('/services', function () {
    return view('frontend/pages/services');
});
Route::get('/blog', function () {
    return view('frontend/pages/blog');
});
Route::get('/contact', function () {
    return view('frontend/pages/contact');
});



Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
