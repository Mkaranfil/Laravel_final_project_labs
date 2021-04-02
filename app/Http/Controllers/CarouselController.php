<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel=Carousel::all();
        return view('backend/pages/home/bHS1',compact('carousel',));
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
            "nom" => 'required',
            "src" => 'required',
        ]);
        $store = new Carousel;
        $store->nom = $request->nom;
        Storage::put('public/img/', $request->file('src'));
        $store->src = $request->file('src')->hashName();
        $store->save();
        return redirect()->back()->with('status', "Ajout confirme!");
    }

  
    public function show($id)
    {
        $show = Carousel::find($id);
        return view('backend/pages/show/bHS1Show',compact('show',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Carousel::find($id);
       
       
        return view('backend/pages/edit/bHS1Edit',compact('edit',));
    }

  
    public function update(Request $request,$id)
    {
        $validation = $request->validate([
            "nom" => 'required',
            "src" => 'required',
        ]);
        $update =Carousel::find($id);

        Storage::delete('public/img/'.$update->src);
        Storage::put('public/img/', $request->file('src'));
        $update->src = $request->file('src')->hashName();
        $update->nom=$request->nom; 
        $update->save();

        // dd($update);

        return redirect()->back()->with('logo','modification confirme!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy= Carousel::find($id);
        Storage::delete('public/img'.$destroy->src);
        $destroy->delete();

        return redirect()->back()->with('delete','Image supprime!');
    }
}
