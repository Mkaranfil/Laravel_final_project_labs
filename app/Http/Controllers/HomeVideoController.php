<?php

namespace App\Http\Controllers;

use App\Models\HomeVideo;
use Illuminate\Http\Request;

class HomeVideoController extends Controller
{
   
    public function index()
    {
        $video=HomeVideo::all();
        return view('backend/pages/home/homeVideo',compact('video',));
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
     * @param  \App\Models\HomeVideo  $homeVideo
     * @return \Illuminate\Http\Response
     */
    public function show(HomeVideo $homeVideo)
    {
        //
    }

    public function edit($id)
    {
        $edit = HomeVideo::find($id);
         return view('backend/pages/edit/homeVideoEdit',compact('edit',));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "lien" => 'required',
            "info" => 'required',
        ]);
        $update = HomeVideo::find($id);
        $update->lien = $request->lien;
        $update->info = $request->info;
        $update->save();
        return redirect()->back()->with('status', "Edit confirme!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeVideo  $homeVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeVideo $homeVideo)
    {
        //
    }
}
