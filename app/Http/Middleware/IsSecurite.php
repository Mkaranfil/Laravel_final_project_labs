<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class IsSecurite
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
        // dd($request->route()->parameters()['selfUser']);
        $id = $request->route()->parameters()['selfUser'];
        if ($request->user()->id == $id) {
            return  $next($request);
        } else {
            return  redirect()->back();
        }
    }
}
