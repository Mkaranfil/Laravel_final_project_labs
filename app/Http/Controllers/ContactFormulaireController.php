<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\ContactFormulaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            // "name" => 'required',
            // "email" => 'required',
            "subject_id" => 'required',
            "message" => 'required'
        ]);

        $store = new ContactFormulaire;
        $store->name = $request->name;
        $store->email = $request->email;
        $store->subject_id = $request->subject_id;
        $store->message = $request->message;
        $store->save();

        Mail::to('LabsCompany@gmail.com')->send(new ContactFormMail ($request));
        return redirect()->back()->with('status','Votre message a bien ete envoye');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactFormulaire  $contactFormulaire
     * @return \Illuminate\Http\Response
     */
    public function show(ContactFormulaire $contactFormulaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactFormulaire  $contactFormulaire
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactFormulaire $contactFormulaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactFormulaire  $contactFormulaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactFormulaire $contactFormulaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactFormulaire  $contactFormulaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactFormulaire $contactFormulaire)
    {
        //
    }
}
