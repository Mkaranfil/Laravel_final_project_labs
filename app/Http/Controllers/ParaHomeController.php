<?php

namespace App\Http\Controllers;

use App\Models\ParaHome;
use Database\Seeders\ParaHomeSeeder;
use Illuminate\Http\Request;

class ParaHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $para=ParaHome::all();
        return view('backend/pages/home/paragrapheHome',compact('para',));
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
            "info" => 'required',
        ]);
        $store = new ParaHome;
        $store->texte = $request->texte;
        $store->info = $request->info;
        $store->save();
        return redirect()->back()->with('status', "Ajout confirme!");
    }

    public function show($id)
    {
        $show = ParaHome::find($id);
        return view('backend/pages/show/paraShow',compact('show',));
    }

    public function edit($id)
    {
        $edit = ParaHome::find($id);
        return view('backend/pages/edit/paraHomeEdit',compact('edit'));
    }

   
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "texte" => 'required',
            "info" => 'required',
        ]);
        $update = ParaHome::find($id);
        $update->texte = $request->texte;
        $update->info = $request->info;
        $update->save();
        return redirect()->back()->with('status', "Edit confirme!");
    }

    public function destroy($id)
    {
        $destroy = ParaHome::find($id);
        $destroy->delete();
        return redirect()->back()->with('delete', "Delet confirme!");
    }
}
