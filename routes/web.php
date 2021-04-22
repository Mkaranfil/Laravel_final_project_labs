<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContactAdresseController;
use App\Http\Controllers\ContactFormulaireController;
use App\Http\Controllers\ContactMapController;
use App\Http\Controllers\ContactSubjectController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HomeTitreController;
use App\Http\Controllers\HomeVideoController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\LogoTitreController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\NewsletterMailController;
use App\Http\Controllers\ParaHomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SelfUserController;
use App\Http\Controllers\ServiceCardController;
use App\Http\Controllers\ServiceListeController;
use App\Http\Controllers\ServiceTitreController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestimonialController;
use App\Models\Carousel;
use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\ContactAdresse;
use App\Models\ContactMap;
use App\Models\ContactSubject;
use App\Models\ContactUs;
use App\Models\Footer;
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
use Database\Seeders\ContactMapSeeder;
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
    $footer=Footer::all();
    // // -----HOME-----
    $carousel=Carousel::all();
    $homeTitre=HomeTitre::all();
    $para=ParaHome::all();
    $video=HomeVideo::all();
    $testimonial=Testimonial::orderBy('id','DESC')->get()->take(6);
    $serviceListe=ServiceListe::all();
    $users=User::all()->where('check','==','1');
    // -----CONTACT-----
    $contactUs=ContactUs::all();
    $contactAdresse=ContactAdresse::all();
    $subject=ContactSubject::all();
    return view('frontend/pages/home',compact('navbar','logo','logoTitre','carousel','homeTitre','para','video','testimonial','serviceListe','users','footer','contactUs','contactAdresse','subject'));
});
Route::get('/services', function () {
    // -----Template-----
    $navbar= Navbar::all();
    $logo=Logo::all();
    $logoTitre=LogoTitre::all();
    $footer=Footer::all();
    // -----SERVICES-----
    $serviceTitre=ServiceTitre::all();
    $serviceListe=ServiceListe::orderBy('id','DESC')->paginate(9);
    $serviceSmart=ServiceListe::orderBy('id','DESC')->get()->take(6);
    // $pagination= DB::table('service_listes')->orderBy('id','desc')->paginate(9);
    $serviceCarte=ServiceCard::orderBy('id','DESC')->get()->take(3);
    // -----CONTACT-----
    $contactUs=ContactUs::all();
    $contactAdresse=ContactAdresse::all();
    $subject=ContactSubject::all();
    return view('frontend/pages/services', compact('navbar','logo','logoTitre','serviceTitre','serviceListe','serviceSmart','serviceCarte','footer','contactUs','contactAdresse','subject'));
});
Route::get('/blog', function () {
     // -----Template-----
     $navbar= Navbar::all();
     $logo=Logo::all();
     $logoTitre=LogoTitre::all();
     $footer=Footer::all();
    // -----Blog-----
    $tag=Tag::all();
    $categorie=Categorie::all();
    $post=Post::orderBy('id','DESC')->paginate(3);
     // -----Commentaire-----
     $postAll=Post::all();
     $comsValide=Commentaire::where('check',1)->get();
    //  $coms=$comsValide->where('post_id',$postAll->id);
  

    return view('frontend/pages/blog',compact('navbar','logo','logoTitre','tag','categorie','post','comsValide','footer'));
});
// Route::get('/blog-post', function () {
//      // -----Template-----
//      $navbar= Navbar::all();
//      $logo=Logo::all();
//      $logoTitre=LogoTitre::all();
//      // -----Blog-----
//     $tag=Tag::all();
//     $categorie=Categorie::all();
//     $post=Post::all();
//     return view('frontend/pages/blog-post',compact('navbar','logo','logoTitre','tag','categorie','post'));
// });
Route::get('/contact', function () {
     // -----Template-----
     $navbar= Navbar::all();
     $logo=Logo::all();
     $logoTitre=LogoTitre::all();
     $footer=Footer::all();
    // -----CONTACT-----
    $contactUs=ContactUs::all();
    $contactAdresse=ContactAdresse::all();
    $subject=ContactSubject::all();
    $map=ContactMap::first();
    return view('frontend/pages/contact',compact('navbar','logo','logoTitre','footer','contactUs','contactAdresse','subject','map'));
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
// -----SelfUser----
Route::resource('/selfUser', SelfUserController::class);
// -----BLOG----
Route::resource('blogCategorie', CategorieController::class);
Route::resource('blogTag', TagController::class);
Route::resource('blogArticle', PostController::class);
Route::get('/showBo/{id}', [PostController::class,'showBo']);
Route::get('/validerPost/{id}', [PostController::class,'valider']);
Route::get('/search', [BlogPostController::class, 'search']);
Route::get('/filtreCategorie/{id}', [BlogPostController::class, 'filtreCategorie']);
Route::get('/filtreTag/{id}', [BlogPostController::class, 'filtreTag']);
// -----COMMENTAIRE----
Route::resource('/commentaire', CommentaireController::class);
Route::get('/validerComs/{id}', [CommentaireController::class,'validerComs']);
// -----FOOTER----
Route::resource('/footer', FooterController::class);
// -----NEWSLETTER----
Route::resource('/newsletterMail', NewsletterMailController::class);
// -----CONTACT----
Route::resource('/contactUs', ContactUsController::class);
Route::resource('/contactAdresse',ContactAdresseController::class);
Route::resource('/contactSubject',ContactSubjectController::class);
Route::resource('/contactFormulaire',ContactFormulaireController::class);
Route::resource('/map',ContactMapController::class);

