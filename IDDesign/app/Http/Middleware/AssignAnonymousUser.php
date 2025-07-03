<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AssignAnonymousUser
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            return $next($request);
        }

        if(session()->has('anonymous_user')){
            $a_user = User::find(session('anonymous_user'));
            if($a_user){
                return $next($request);
            }
        }

        $a_user = User::create([
            'name' => null,
            'email' => null,
            'password' => null
        ]);

        session(['anonymous_user' => $a_user->id]);
        return $next($request);
    }
}
