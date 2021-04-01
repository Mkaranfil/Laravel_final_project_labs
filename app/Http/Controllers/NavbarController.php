<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function index()
    {
        $navbar=Navbar::all();
        return view('backend/pages/bNavBar',compact('navbar',));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    
    public function store(Request $request)
    {
        $validation = $request->validate([
            "titre" => 'required',
            "href" => 'required',
        ]);
        $store = new Navbar;
        $store->titre = $request->titre;
        $store->href = $request->href;
        $store->save();
        return redirect()->back()->with('status', "Ajout confirme!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\navbar  $navbar
     * @return \Illuminate\Http\Response
     */
    public function show(navbar $navbar)
    {
        //
    }

    public function edit($id)
    {
        $edit = Navbar::find($id);
        return view('backend/pages/edit/navbarEdit',compact('edit'));
    }

  
    public function update(Request $request,$id)
    {
        $validation = $request->validate([
            "titre" => 'required',
            "href" => 'required',
        ]);
        $update = Navbar::find($id);
        $update->titre = $request->titre;
        $update->href = $request->href;
        $update->save();
        return redirect()->back()->with('status', "Edit confirme!");
        
    }

   
    public function destroy($id)
    {
        $destroy = Navbar::find($id);
        $destroy->delete();
        return redirect()->back()->with('delete', "Delet confirme!");
    }
}
