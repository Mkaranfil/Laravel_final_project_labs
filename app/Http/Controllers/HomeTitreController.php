<?php

namespace App\Http\Controllers;

use App\Models\HomeTitre;
use Illuminate\Http\Request;

class HomeTitreController extends Controller
{
  
    public function index()
    {
        $homeTitre=HomeTitre::all();
        return view('backend/pages/home/homeTitre',compact('homeTitre',));
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
     * @param  \App\Models\HomeTitre  $homeTitre
     * @return \Illuminate\Http\Response
     */
    public function show(HomeTitre $homeTitre)
    {
        //
    }

   
    public function edit($id)
    {
        $edit = HomeTitre::find($id);
        return view('backend/pages/edit/homeTitreEdit',compact('edit'));
    }

    
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "titre" => 'required',
            "description" => 'required',
        ]);
        $update = HomeTitre::find($id);
        $update->titre = $request->titre;
        $update->description = $request->description;
        $update->save();
        return redirect()->back()->with('status', "Edit confirme!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeTitre  $homeTitre
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeTitre $homeTitre)
    {
        //
    }
}
