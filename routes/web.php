<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\HomeTitreController;
use App\Http\Controllers\HomeVideoController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\LogoTitreController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\ParaHomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceCardController;
use App\Http\Controllers\ServiceListeController;
use App\Http\Controllers\ServiceTitreController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestimonialController;
use App\Models\Carousel;
use App\Models\Categorie;
use App\Models\HomeTitre;
use App\Models\HomeVideo;
use App\Models\Logo;
use App\Models\LogoTitre;
use App\Models\Navbar;
use App\Models\ParaHome;
use App\Models\Post;
use App\Models\ServiceCard;
use App\Models\ServiceListe;
use App\Models\ServiceTitre;
use App\Models\Tag;
use App\Models\Testimonial;
use App\Models\User;
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
    $users=User::all()->where('check','==','1');
    return view('frontend/pages/home',compact('navbar','logo','logoTitre','carousel','homeTitre','para','video','testimonial','serviceListe','users'));
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
    $serviceCarte=ServiceCard::orderBy('id','DESC')->get()->take(3); 
    return view('frontend/pages/services', compact('navbar','logo','logoTitre','serviceTitre','serviceListe','serviceSmart','serviceCarte'));
});
Route::get('/blog', function () {
     // -----Template-----
     $navbar= Navbar::all();
     $logo=Logo::all();
     $logoTitre=LogoTitre::all();
    // -----Blog-----
    $tag=Tag::all();
    $categorie=Categorie::all();
    $post=Post::orderBy('id','DESC')->paginate(2);
    return view('frontend/pages/blog',compact('navbar','logo','logoTitre','tag','categorie','post'));
});
Route::get('/blog-post', function () {
     // -----Template-----
     $navbar= Navbar::all();
     $logo=Logo::all();
     $logoTitre=LogoTitre::all();
     // -----Blog-----
    $tag=Tag::all();
    $categorie=Categorie::all();
    $post=Post::all();
    return view('frontend/pages/blog-post',compact('navbar','logo','logoTitre','tag','categorie','post'));
});
Route::get('/contact', function () {
     // -----Template-----
     $navbar= Navbar::all();
     $logo=Logo::all();
     $logoTitre=LogoTitre::all();
    return view('frontend/pages/contact',compact('navbar','logo','logoTitre',));
});

Route::fallback(function () {
    return redirect()->back();
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
Route::resource('serviceCarte', ServiceCardController::class);
// -----MEMBRES----
Route::resource('membre', MembreController::class);
Route::resource('poste', PosteController::class);
Route::resource('role', RoleController::class);
Route::get('/valider/{id}', [MembreController::class,'valider']);
// -----BLOG----
Route::resource('blogCategorie', CategorieController::class);
Route::resource('blogTag', TagController::class);
Route::resource('blogArticle', PostController::class);
Route::get('/valider/{id}', [PostController::class,'valider']);
Route::get('/search', [BlogPostController::class, 'search']);
Route::get('/filtreCategorie/{id}', [BlogPostController::class, 'filtreCategorie']);
Route::get('/filtreTag/{id}', [BlogPostController::class, 'filtreTag']);