<?php

namespace App\Http\Controllers;

use App\Models\ServiceTitre;
use Illuminate\Http\Request;

class ServiceTitreController extends Controller
{
   
    public function index()
    {
        $serviceTitre=ServiceTitre::all();
        return view('backend/pages/service/serviceTitre',compact('serviceTitre',));
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
     * @param  \App\Models\ServiceTitre  $serviceTitre
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceTitre $serviceTitre)
    {
        //
    }

    public function edit($id)
    {
        $edit = ServiceTitre::find($id);
        return view('backend/pages/edit/service/serviceTitreEdit',compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "titre" => 'required',
            "info" => 'required',
        ]);
        $update = ServiceTitre::find($id);
        $update->titre = $request->titre;
        $update->info = $request->info;
        $update->save();
        return redirect()->back()->with('status', "Edit confirme!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceTitre  $serviceTitre
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceTitre $serviceTitre)
    {
        //
    }
}
