<?php

namespace App\Http\Controllers;

use App\Models\Icon;
use App\Models\ServiceListe;
use Illuminate\Http\Request;

class ServiceListeController extends Controller
{
    public function index()
    {
        $serviceListe=ServiceListe::all();
        $icon=Icon::all();
        return view('backend/pages/service/serviceListe',compact('serviceListe','icon'));
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
            "texte" => 'required',
            "titre" => 'required',
            "icon_id" => 'required',
        ]);
      

        $store = new ServiceListe;
        $store->texte = $request->texte;
        $store->titre = $request->titre;
        $store->icon_id = $request->icon_id;
        $store->save();


        return redirect()->back()->with('status', "Ajout confirme!");
    }

    public function show($id)
    {
        $show = ServiceListe::find($id);
        return view('backend/pages/show/service/serviceListeShow',compact('show',));
    }

    public function edit($id)
    {
        $edit = ServiceListe::find($id);
        $icon=Icon::all();
        return view('backend/pages/edit/service/serviceListeEdit',compact('edit','icon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceListe  $serviceListe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceListe $serviceListe)
    {
        //
    }

    public function destroy($id)
    {
        $destroy = ServiceListe::find($id);
        $destroy->delete();
        return redirect()->back()->with('delete', "Delet confirme!");
    }
}
