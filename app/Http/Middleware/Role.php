<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;
use App\Models\User;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,...$roles)
    {
        if (!Auth::check()){
            return redirect('login');
        }

        $user = Auth::user();

        if($user->isAdmin()){
            return $next($request);
        }
        
        if (!in_array($user->level,$roles)){
            return abort(401);
        }

        return $next($request);
    }
}
