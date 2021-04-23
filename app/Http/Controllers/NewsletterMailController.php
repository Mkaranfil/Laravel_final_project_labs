<?php

namespace App\Http\Controllers;

use App\Mail\NLMail;
use App\Models\NewsletterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterMailController extends Controller
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
            "email" => 'required',
        
        ]);
        $store = new NewsletterMail();
        $store->email = $request->email;
        $store->save();
        $lastMail = $store->orderBy('id','desc')->first();
        Mail::to($lastMail)->send(new NLMail($lastMail));
        return redirect()->back()->with('NLstatus', "Abonnement au Newsletter confirme! Verifie vos mails!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsletterMail  $newsletterMail
     * @return \Illuminate\Http\Response
     */
    public function show(NewsletterMail $newsletterMail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsletterMail  $newsletterMail
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsletterMail $newsletterMail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsletterMail  $newsletterMail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsletterMail $newsletterMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsletterMail  $newsletterMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsletterMail $newsletterMail)
    {
        //
    }
}
