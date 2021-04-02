<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\LogoTitreController;
use App\Http\Controllers\NavbarController;
use App\Models\Carousel;
use App\Models\Logo;
use App\Models\LogoTitre;
use App\Models\Navbar;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    $navbar= Navbar::all();
    $logo=Logo::all();
    $logoTitre=LogoTitre::all();
    $carousel=Carousel::all();
    return view('frontend/pages/home',compact('navbar','logo','logoTitre','carousel'));
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
Route::get('/membresLabs', function() {
    $logo=Logo::all();
    return view('home',compact('logo'));
})->name('homeLTE')->middleware('auth');



Route::resource('navbar', NavbarController::class);
Route::resource('logo', LogoController::class);
Route::resource('logoTitre', LogoTitreController::class);
Route::resource('carousel', CarouselController::class);