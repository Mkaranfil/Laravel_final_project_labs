<?php

namespace App\Http\Controllers;

use App\Models\ContactSubject;
use Illuminate\Http\Request;

class ContactSubjectController extends Controller
{
    public function index()
    {
        $subject=ContactSubject::all();
        return view('backend/pages/contact/contactSubject',compact('subject'));
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
            "subject" => 'required',
          
        ]);
        $store = new ContactSubject();
        $store->subject = $request->subject;
        $store->save();
        return redirect()->back()->with('status', "Ajout confirme!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactSubject  $contactSubject
     * @return \Illuminate\Http\Response
     */
    public function show(ContactSubject $contactSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactSubject  $contactSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactSubject $contactSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactSubject  $contactSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactSubject $contactSubject)
    {
        //
    }

    public function destroy($id)
    {
        $destroy = ContactSubject::find($id);
        $destroy->delete();
        return redirect()->back()->with('delete', "Delet confirme!");
    }
}
