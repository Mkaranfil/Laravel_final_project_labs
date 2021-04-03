<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\HomeTitreController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\LogoTitreController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\ParaHomeController;
use App\Models\Carousel;
use App\Models\HomeTitre;
use App\Models\Logo;
use App\Models\LogoTitre;
use App\Models\Navbar;
use App\Models\ParaHome;
use Database\Seeders\HomeTitreSeeder;
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
    $homeTitre=HomeTitre::all();
    $para=ParaHome::all();
    return view('frontend/pages/home',compact('navbar','logo','logoTitre','carousel','homeTitre','para'));
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
Route::resource('homeTitre', HomeTitreController::class);
Route::resource('paraHome', ParaHomeController::class);