<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            Auth::logout();
            return redirect()->route('login')->with('warning', 'Anda belum pernah melakukan autorisasi sebelumnya');
        }
        $user = Auth::user();
        if ($user->roles()->count() > 0) {
            foreach ($roles as $key => $role) {
                if ($user->roles()->where('slug', $role)->exists()) {
                    return $next($request);
                }
            }
        }
        abort(403);
    }
}
