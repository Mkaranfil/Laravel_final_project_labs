<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\TestiPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
   
    public function index()
    {
        $testi=Testimonial::all();
        return view('backend/pages/home/testimonial',compact('testi',));
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
            "prenom" => 'required',
            "company" => 'required',
            "texte" => 'required',
            "src" => 'required',
        ]);
        $store2= new TestiPicture;
        Storage::put('public/img/avatar', $request->file('src'));
        $store2->src = $request->file('src')->hashName();
        $store2->save();

        $store = new Testimonial;
        $store->nom = $request->nom;
        $store->prenom = $request->prenom;
        $store->company = $request->company;
        $store->texte = $request->texte;
        $store->picture_id = $store2->id;
        $store->save();


        return redirect()->back()->with('status', "Ajout confirme!");
    }

    public function show($id)
    {
        $show = Testimonial::find($id);
        return view('backend/pages/show/testimonialShow',compact('show',));
    }

    public function edit($id)
    {
        $edit = Testimonial::find($id);
        return view('backend/pages/edit/testimonialEdit',compact('edit'));
    }

    public function update(Request $request,$id)
    {
        $validation = $request->validate([
            "nom" => 'required',
            "prenom" => 'required',
            "company" => 'required',
            "texte" => 'required',
            "src" => 'required',
        ]);

        $update =Testimonial::find($id);
        $update->nom = $request->nom;
        $update->prenom = $request->prenom;
        $update->company = $request->company;
        $update->texte = $request->texte;
        $update->save();
        
        $img =TestiPicture::find($update->picture_id);
        Storage::delete('public/img/avatar'.$img->src);
        Storage::put('public/img/avatar', $request->file('src'));
        $img->src = $request->file('src')->hashName();
        $img->save();
        
    
        return redirect()->back()->with('status','modification confirme!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Testimonial::find($id);
        $destroyImg = TestiPicture::find($destroy->picture_id);
        Storage::delete('public/img/avatar'.$destroyImg->src);
        $destroyImg->delete();
        $destroy->delete();
        return redirect()->back()->with('delete', "Delet confirme!");
    }
}
