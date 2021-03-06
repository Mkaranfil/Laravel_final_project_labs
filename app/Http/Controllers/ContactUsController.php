<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactUs=ContactUs::all();
        return view('backend/pages/contact/contactUs',compact('contactUs'));
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
        ]);
        $store = new ContactUs();
        $store->texte = $request->texte;
        $store->save();
        return redirect()->back()->with('status', "Ajout confirme!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    public function edit($id)
    {
        $edit = ContactUs::find($id);
        return view('backend/pages/edit/contact/contactUsEdit',compact('edit'));
    }

   
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "texte" => 'required',
        ]);
        $update = ContactUs::find($id);
        $update->texte = $request->texte;
        $update->save();
        return redirect()->back()->with('status', "Edit confirme!");
    }

    public function destroy($id)
    {
        $destroy = ContactUs::find($id);
        $destroy->delete();
        return redirect()->back()->with('delete', "Delet confirme!");
    }
}
