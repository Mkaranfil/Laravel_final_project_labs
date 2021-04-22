<?php

namespace App\Http\Controllers;

use App\Models\ContactMap;
use Illuminate\Http\Request;

class ContactMapController extends Controller
{
    public function index()
    {
        $map=ContactMap::all();
        return view('backend/pages/contact/map',compact('map'));
       
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
     * @param  \App\Models\ContactMap  $contactMap
     * @return \Illuminate\Http\Response
     */
    public function show(ContactMap $contactMap)
    {
        //
    }

    public function edit($id)
    {
        $edit = ContactMap::find($id);
        return view('backend/pages/edit/contact/mapEdit',compact('edit'));
    }

   
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "src" => 'required',
           
        ]);
        $update = ContactMap::find($id);
        $update->src = $request->src;
        $update->save();
        return redirect()->back()->with('status', "Edit confirme!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactMap  $contactMap
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactMap $contactMap)
    {
        //
    }
}
