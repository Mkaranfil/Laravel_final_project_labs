<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Categorie;
use App\Models\Logo;
use App\Models\LogoTitre;
use App\Models\Navbar;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        //
    }

    public function search(Request $request){

         // -----Template-----
            $navbar=Navbar::all();
            $logo=Logo::all();
            $logoTitre=LogoTitre::all();
         // -----Newsletter-----
        
         // -----BLOG-----
            $tag=Tag::all();
            $categorie=Categorie::all();
            
         // -----Search-----
            $search = $request->input('search');
            $post = Post::query()->where('titre', 'LIKE', "%{$search}%")->paginate(2);
            // ->orWhere('text', 'LIKE', "%{$search}%")


        // if ($post->isEmpty()) 
        // if ($search==null){
            // return redirect()->back()->with('search','Veuillez introduire votre recherche');
        // } else {
            return view('frontend/pages/blog', compact('logo', 'navbar', 'categorie', 'tag', 'post','logoTitre',));
        // }
    }

    public function filtreCategorie ($id){

        // -----Template-----
          $navbar=Navbar::all();
          $logo=Logo::all();
          $logoTitre=LogoTitre::all();
    
        // -----Newsletter-----


        // -----COMMENTAIRE-----
      
        // -----BLOG-----
          $tag=Tag::all();
          $categorie=Categorie::all();
        

          $post=Post::where('categorie_id',$id)->paginate(2);


          return view('frontend/pages/blog', compact('logo', 'navbar', 'categorie', 'tag', 'post','logoTitre',));
       
    }
    public function filtreTag($id){

        // -----Template-----
          $navbar=Navbar::all();
          $logo=Logo::all();
          $logoTitre=LogoTitre::all();
    
        // -----Newsletter-----


        // -----COMMENTAIRE-----
      
        // -----BLOG-----
          $tag=Tag::all();
          $categorie=Categorie::all();
          $allPost=Post::all();
         
        

          $post=[];
          $array=[];
          foreach ($allPost as $item) {
              $array =$item->tags->pluck('id')->toArray();
              if(in_array($id,$array)){
                  array_push($post,$item);
              }
              unset($array);
          }


          return view('frontend/pages/blog', compact('logo', 'navbar', 'categorie', 'tag', 'post','logoTitre',));
       
    }


}
