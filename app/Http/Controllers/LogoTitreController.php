<?php

namespace App\Http\Controllers;

use App\Models\LogoTitre;
use Illuminate\Http\Request;

class LogoTitreController extends Controller
{
   
    public function index()
    {
     
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
        
        ]);
        $store = new LogoTitre();
        $store->titre = $request->titre;
        $store->save();
        return redirect()->back()->with('status', "Ajout confirme!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $edit = LogoTitre::find($id);
        
        return view('backend/pages/edit/logoTitreEdit',compact('edit',));
    }

    public function update(Request $request, $id)
    {
        $update = LogoTitre::find($id);
        $update->titre=$request->titre; 
        $update->save();

        return redirect()->back()->with('logo','modification confirme!');
    }

  
    public function destroy($id)
    {
        $destroy = LogoTitre::find($id);
        $destroy->delete();
        return redirect()->back()->with('delete', "Delet confirme!");
    }
}
