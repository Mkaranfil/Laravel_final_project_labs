<?php

namespace App\Http\Controllers;

use App\Models\CardPicture;
use App\Models\ServiceCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceCardController extends Controller
{
    public function index()
    {
        $serviceCarte=ServiceCard::all();
        return view('backend/pages/service/serviceCarte',compact('serviceCarte',));
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
            "titre" => 'required',
            "texte" => 'required',
            "src" => 'required',
        ]);
        $store2= new CardPicture;
        Storage::put('public/img/', $request->file('src'));
        $store2->src = $request->file('src')->hashName();
        $store2->save();

        $store = new ServiceCard;
        $store->titre = $request->titre;
        $store->texte = $request->texte;
        $store->picture_id = $store2->id;
        $store->save();


        return redirect()->back()->with('status', "Ajout confirme!");
    }

    public function show($id)
    {
        $show = ServiceCard::find($id);
        return view('backend/pages/show/service/serviceCarteShow',compact('show',));
    }

    public function edit($id)
    {
        $edit = ServiceCard::find($id);
        return view('backend/pages/edit/service/serviceCarteEdit',compact('edit'));
    }

    public function update(Request $request,$id)
    {
        $validation = $request->validate([
            "titre" => 'required',
            "texte" => 'required',
            "src" => 'required',
        ]);

        $update =ServiceCard::find($id);
        $update->titre = $request->titre;
        $update->texte = $request->texte;
        $update->save();
        
        $img =CardPicture::find($update->picture_id);
        Storage::delete('public/img/'.$img->src);
        Storage::put('public/img/', $request->file('src'));
        $img->src = $request->file('src')->hashName();
        $img->save();
        
    
        return redirect()->back()->with('status','modification confirme!');
    }

    public function destroy($id)
    {
        $destroy = ServiceCard::find($id);
        $destroyImg = CardPicture::find($destroy->picture_id);
        Storage::delete('public/img/'.$destroyImg->src);
        $destroyImg->delete();
        $destroy->delete();
        return redirect()->back()->with('delete', "Delet confirme!");
    }
}
