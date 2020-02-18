<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsSelf
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
        $user = User::find($request->route('admin'));
        if (Auth::check()) {
            if ($user->is_admin == 0) {
                return $next($request);
            }
        }
        return redirect()->back()->with('danger', 'Kamu tidak memiliki akses ke halaman tersebut!');
    }
}
