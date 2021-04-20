<?php

namespace App\Http\Controllers;

use App\Models\ContactAdresse;
use Illuminate\Http\Request;

class ContactAdresseController extends Controller
{
    public function index()
    {
        $contactAdresse=ContactAdresse::all();
        return view('backend/pages/contact/contactAdresse',compact('contactAdresse'));
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
     * @param  \App\Models\ContactAdresse  $contactAdresse
     * @return \Illuminate\Http\Response
     */
    public function show(ContactAdresse $contactAdresse)
    {
        //
    }

    public function edit($id)
    {
        $edit = ContactAdresse::find($id);
        return view('backend/pages/edit/contact/contactAdresseEdit',compact('edit'));
    }

    public function update(Request $request, $id)
    {
        // $validation = $request->validate([
        //     "texte" => 'required',
        // ]);
        $update = ContactAdresse::find($id);
        $update->rue = $request->rue;
        $update->numero = $request->numero;
        $update->commune = $request->commune;
        $update->code_postale = $request->code_postale;
        $update->tel = $request->tel;
        $update->email = $request->email;
        $update->save();
        return redirect()->back()->with('status', "Edit confirme!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactAdresse  $contactAdresse
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactAdresse $contactAdresse)
    {
        //
    }
}
