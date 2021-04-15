<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footer=Footer::all();
        return view('backend/pages/bFooter',compact('footer',));
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
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function show(Footer $footer)
    {
        //
    }

    public function edit($id)
    {
        $edit = Footer::find($id);
        return view('backend/pages/edit/footerEdit',compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "span1" => 'required',
            "span2" => 'required',
            "url" => 'required',
           
        ]);
        $update = Footer::find($id);
        $update->span1 = $request->span1;
        $update->span2= $request->span2;
        $update->url = $request->url;
        $update->save();
        return redirect()->back()->with('status', "Edit confirme!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $footer)
    {
        //
    }
}
