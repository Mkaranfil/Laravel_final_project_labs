<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\UserPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CommentaireController extends Controller
{
    public function index()
    {
        $coms=Commentaire::all();
        return view('backend/pages/blog/blogCommentaire',compact('coms',));
    }

    public function validerComs($id)
    {
        $valider = Commentaire::find($id);
        $valider->check = 1;
        $valider->save();
        return redirect()->back()->with('status','Commentaire valide!');
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
        // $validation = $request->validate([
        //     "comment" => 'required',
        // ]);

        $store = new Commentaire;
        if (Auth::check()){
            $store->picture_id = Auth::user()->picture_id;
            $store->nom = Auth::user()->nom.' '.Auth::user()->prenom;
            $store->email = Auth::user()->email;
        } else{
            $store->picture_id = 4;
            $store->nom = $request->nom;
            $store->email = $request->email;
        }
        // $previous = url()->previous();
        // $store->post_id = (int)Str::afterLast($previous, '/'); 
        $postId = explode('/', url()->previous());
        $store->post_id = end($postId);
        $store->commentaire = $request->commentaire;
        $store->check = 0;

        $store->save();
        return redirect()->back()->with('status','Votre commentaire a bien ete enregistre, veuillez attendre la validation!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        //
    }

    public function destroy($id)
    {
        $destroy = Commentaire::find($id);
        $destroy->delete();
        return redirect()->back()->with('delete', "Delet confirme!");
    }
}
