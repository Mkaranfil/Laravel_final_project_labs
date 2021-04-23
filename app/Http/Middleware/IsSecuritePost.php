<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSecuritePost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(Auth::id());
        $idUser=$request->user()->id;
        // $idPost=$request->route()->parameters()['blogArticle'];
        if ($idUser == Auth::id()) {
            return  $next($request);
        } else {
            return  redirect()->back();
        }

        
    }
}
