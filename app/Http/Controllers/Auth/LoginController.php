<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    public function authenticated(LoginRequest $request)
    {
    	$credentials = $request->only(['username','password']);

    	if (Auth::attempt($credentials)) {
    		if (Auth::user()->is_active == 1) {
                return redirect()->intended('user/home');
    		}else{
                Auth::logout();
                return back()->with('error','Akun nonaktif');   
    		}
    	}else{
    		return back()->with('error','Username atau Password salah');
    	}
    }
}
