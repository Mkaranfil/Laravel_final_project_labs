<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\HomeTitreController;
use App\Http\Controllers\HomeVideoController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\LogoTitreController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\ParaHomeController;
use App\Http\Controllers\ServiceListeController;
use App\Http\Controllers\ServiceTitreController;
use App\Http\Controllers\TestimonialController;
use App\Models\Carousel;
use App\Models\HomeTitre;
use App\Models\HomeVideo;
use App\Models\Logo;
use App\Models\LogoTitre;
use App\Models\Navbar;
use App\Models\ParaHome;
use App\Models\ServiceListe;
use App\Models\ServiceTitre;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    // -----Template-----
    $navbar= Navbar::all();
    $logo=Logo::all();
    $logoTitre=LogoTitre::all();
    // // -----HOME-----
    $carousel=Carousel::all();
    $homeTitre=HomeTitre::all();
    $para=ParaHome::all();
    $video=HomeVideo::all();
    $testimonial=Testimonial::orderBy('id','DESC')->get()->take(6);
    $serviceListe=ServiceListe::all();
    return view('frontend/pages/home',compact('navbar','logo','logoTitre','carousel','homeTitre','para','video','testimonial','serviceListe'));
});
Route::get('/services', function () {
    // -----Template-----
    $navbar= Navbar::all();
    $logo=Logo::all();
    $logoTitre=LogoTitre::all();
    // -----SERVICES-----
    $serviceTitre=ServiceTitre::all();
    $serviceListe=ServiceListe::orderBy('id','DESC')->paginate(9);
    $serviceSmart=ServiceListe::orderBy('id','DESC')->get()->take(6);
    // $pagination= DB::table('service_listes')->orderBy('id','desc')->paginate(9);
    return view('frontend/pages/services', compact('navbar','logo','logoTitre','serviceTitre','serviceListe','serviceSmart'));
});
Route::get('/blog', function () {
     // -----Template-----
     $navbar= Navbar::all();
     $logo=Logo::all();
     $logoTitre=LogoTitre::all();
    return view('frontend/pages/blog',compact('navbar','logo','logoTitre',));
});
Route::get('/contact', function () {
     // -----Template-----
     $navbar= Navbar::all();
     $logo=Logo::all();
     $logoTitre=LogoTitre::all();
    return view('frontend/pages/contact',compact('navbar','logo','logoTitre',));
});



Auth::routes();
Route::get('/membresLabs', function() {
    $logo=Logo::all();
    return view('home',compact('logo'));
})->name('homeLTE')->middleware('auth');


// -----HOME-----
Route::resource('navbar', NavbarController::class);
Route::resource('logo', LogoController::class);
Route::resource('logoTitre', LogoTitreController::class);
Route::resource('carousel', CarouselController::class);
Route::resource('homeTitre', HomeTitreController::class);
Route::resource('paraHome', ParaHomeController::class);
Route::resource('homeVideo', HomeVideoController::class);
Route::resource('testimonial', TestimonialController::class);
// -----SERVICE-----
Route::resource('serviceTitre', ServiceTitreController::class);
Route::resource('serviceListe', ServiceListeController::class);