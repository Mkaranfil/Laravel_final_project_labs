<?php

namespace App\Http\Controllers;

use App\Models\BlogPicture;
use App\Models\Categorie;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $article=Post::all();
        $categorie=Categorie::all();
        $tag=Tag::all();
        $br="<br>";
        return view('backend/pages/blog/blogArticle',compact('article','categorie','tag','br'));
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

    public function store(Request $request)
    {
        $validation = $request->validate([
            "src" => 'required',
            "titre" => 'required',
            "texte" => 'required',
            "categorie_id" => 'required',
        ]);
        $store2 = new BlogPicture;
        Storage::put('/public/img/blog', $request->src);
        $store2->src = $request->file('src')->hashName();
        $store2->save();
        
        
        $store = new Post;
        $store->titre = $request->titre;
        $store->texte = $request->texte;
        $store->categorie_id = $request->categorie_id;
        $store->picture_id = $store2->id;
        $store->check = 0;
        $store->user_id = Auth::id();
        $store->save();
        // speciale tag 
        foreach ($request->tag as $item) {
            $store->tags()->attach($item, ['post_id' => $store->id]);
        }
         // dd($store->id);
        return redirect('/posts');
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    public function edit($id)
    {
        $edit = Post::find($id);
        $categorie=Categorie::all();
        $tag=Tag::all();
        $br="<br>";
        return view('backend/pages/edit/blog/blogArticleEdit',compact('edit','edit','tag','categorie','br'));
    }

    public function update(Request $request,$id)
    {
        $validation = $request->validate([
            "src" => 'required',
            "titre" => 'required',
            "texte" => 'required',
            "categorie_id" => 'required',
        ]);

        $update =Post::find($id);
        $update->titre = $request->titre;
        $update->texte = $request->texte;
        $update->categorie_id = $request->categorie_id;
        $update->check = 1;
        $update->user_id = Auth::id();
        $update->save();

        $img =BlogPicture::find($update->picture_id);
        Storage::delete('public/img/blog'.$img->src);
        Storage::put('public/img/blog', $request->file('src'));
        $img->src = $request->file('src')->hashName();
        $img->save();
        

        $update->tags()->detach();
        foreach ($request->tag as $item) {
            $update->tags()->attach($item, ['post_id' => $update->id]);
        }

        return redirect()->back()->with('status','modification confirme!');;
    }

    public function destroy($id)
    {
        $destroy = Post::find($id);
        $destroyImg = BlogPicture::find($destroy->picture_id);
        Storage::delete('public/img/blog'.$destroyImg->src);
        $destroyImg->delete();
        $destroy->delete();
        return redirect()->back()->with('delete', "Delet confirme!");
    }
}
