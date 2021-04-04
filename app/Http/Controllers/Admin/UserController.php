<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest as Request;
use Illuminate\Http\Request as DefaultRequest;
use App\Events\UserDeleteEvent;

use App\Models\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        $users = User::get();
        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->request->add(['password' => bcrypt($request->password)]);
        User::create($request->all());
        return redirect()->route('admin.user.index')->with('success','Data berhasil ditambah');
    }

    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    public function update(DefaultRequest $request, User $user)
    {   
        $password = $request->password ? bcrypt($request->password) : $request->old_password;
        $request->request->add(['password' => $password]);
        $user->update($request->all());
        return redirect()->route('admin.user.index')->with('success','Data berhasil diupdate');
    }

    public function destroy(User $user)
    {
        event(new UserDeleteEvent($user));
        $user->delete();
        return redirect()->route('admin.user.index')->with('success','Data berhasil dihapus');
    }
}
