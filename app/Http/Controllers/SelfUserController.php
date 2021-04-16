<?php

namespace App\Http\Controllers;

use App\Models\SelfUser;
use App\Models\User;
use Illuminate\Http\Request;

class SelfUserController extends Controller
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
     * @param  \App\Models\SelfUser  $selfUser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = User::find($id);
        return view('backend/pages/membre/selfUser',compact('show'));
    }

    public function edit($id)
    {
        $edit = User::find($id);
        return view('backend/pages/edit/membre/selfUserDescriptionEdit',compact('edit'));
        
    }

    public function update(Request $request, $id)
    {
        // $validation = $request->validate([
        //     "description" => 'required',
        // ]);
        $update = User::find($id);
        $update->description = $request->description;
        $update->save();
        return redirect('/selfUser/{{Auth::user()->id}}')->with('status', "Edit confirme!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SelfUser  $selfUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(SelfUser $selfUser)
    {
        //
    }
}
