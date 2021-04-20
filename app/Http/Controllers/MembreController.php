<?php

namespace App\Http\Controllers;

use App\Mail\MailSend;
use App\Models\Membre;
use App\Models\Poste;
use App\Models\Role;
use App\Models\User;
use App\Models\UserPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MembreController extends Controller
{
    public function index()
    {
        $membre=User::all();
        return view('backend/pages/membre/membreListe',compact('membre',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $membreNV=User::all()->where('check','==',0);
        return view('backend/pages/membre/membreNouveau',compact('membreNV',));
    }
    public function valider($id)
    {
        $valider = User::find($id);
        $emailTo = $valider->email; 
        $valider->check = 1;
        $valider->save();
        Mail::to($emailTo)->send(new MailSend ($valider));
        return redirect()->back()->with('status','Membre accepte!');
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

    public function show($id)
    {
        $show = User::find($id);
        return view('backend/pages/show/membre/membreListeShow',compact('show',));
    }

    public function edit($id)
    {
        $edit = User::find($id);
        $role=Role::all();
        $poste=Poste::all();
        return view('backend/pages/edit/membre/membreListeEdit',compact('edit','role','poste'));
    }

    public function update(Request $request,$id)
    {
       

        $update =User::find($id);
        $update->poste_id = $request->poste_id;
        $update->role_id = $request->role_id;
        $update->save();
        
        return redirect()->back()->with('status','modification confirme!');
    }

    public function destroy($id)
    {
        $destroy = User::find($id);
        $destroyImg = UserPicture::find($destroy->picture_id);
        Storage::delete('public/img/users'.$destroyImg->src);
        $destroyImg->delete();
        $destroy->delete();
        return redirect()->back()->with('delete', "Delet confirme!");
    }
}
