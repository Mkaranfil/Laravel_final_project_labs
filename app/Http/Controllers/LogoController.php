<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\LogoTitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Whoops\Run;

class LogoController extends Controller
{

    public function index()
    {
        $logo=Logo::all();
        $logoTitre=LogoTitre::all();
        return view('backend/pages/bLogo',compact('logo','logoTitre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

   
    public function show($id)
    {
        $show = Logo::find($id);
        return view('backend/pages/show/logoShow',compact('show',));
    }

  
    public function edit($id)
    {
        $edit = Logo::find($id);
        $logo =Logo::all();
       
        return view('backend/pages/edit/logoEdit',compact('edit','logo'));
    }

  
    public function update(Request $request,$id)
    {
        $validation = $request->validate([
            "titre" => 'required',
            "src" => 'required',
        ]);
        $update =Logo::find($id);

        Storage::delete('public/img/'.$update->src);
        Storage::put('public/img/', $request->file('src'));
        $update->src = $request->file('src')->hashName();
        $update->titre=$request->titre; 
        $update->save();

        // dd($update);

        return redirect()->back()->with('logo','modification confirme!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        //
    }
}
