<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $panels = [
            "admin" => "admin panel",
            "web" => "web panel",
        ];
        if (!$request->expectsJson()) {
            if (Auth::guard('web')->check() && $guard == 'admin') {
                $request->session()->flash('message', "Please log out of this account before trying to log in to the {$panels[$guard]}.");
                $request->session()->flash('alert-class', 'alert alert-danger');
            }
            if (Auth::guard('admin')->check()) {
                return redirect("/admin");
            } elseif (Auth::guard('web')->check()) {
                return redirect()->route('pages.home');
            }
        }
        return $next($request);
    }
}
