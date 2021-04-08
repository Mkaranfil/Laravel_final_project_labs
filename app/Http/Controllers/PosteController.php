<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Models\Role;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    public function index()
    {
        $poste=Poste::all();
        $role=Role::all();
        return view('backend/pages/membre/config',compact('poste','role'));
       
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
            "poste" => 'required',
          
        ]);
        $store = new Poste;
        $store->poste = $request->poste;
        $store->save();
        return redirect()->back()->with('status', "Ajout confirme!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function show(Poste $poste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function edit(Poste $poste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poste $poste)
    {
        //
    }

    public function destroy($id)
    {
        $destroy = Poste::find($id);
        $destroy->delete();
        return redirect()->back()->with('delete', "Delet confirme!");
    }
}
