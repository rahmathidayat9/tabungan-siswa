<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ChangePasswordController extends Controller
{
    public function index()
    {
    	return view('user.change-password');
    }

    public function update(Request $request)
    {
    	$this->validate($request,[
    		'password' => 'required',
    	]);
    	
    	$request->request->add(['password' => bcrypt($request->password)]);
    	User::where('id_users',Auth::user()->id_users)->update($request->except(['_token','_method']));
    	return redirect()->route('user.change-password.index')->with('success','Password berhasil diubah');
    }
}
