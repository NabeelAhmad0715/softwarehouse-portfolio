<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMasterUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->is_master == 1) {
            return $next($request);
        }
        $request->session()->flash("error", "You don't have access to these routes.");
        return redirect()->route('admin.pages.home');
    }
}
