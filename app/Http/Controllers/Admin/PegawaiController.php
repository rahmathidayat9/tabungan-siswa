<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\UserWasDeleted;
use App\Models\Pegawai;
use App\Models\User;
use Str;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::get();
        return view('admin.pegawai.index',compact('pegawai'));
    }

    public function create()
    {
        return view('admin.pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'unique:users',
            'email' => 'unique:users',
        ]);
        
        User::create([
            'username' => Str::lower($request->username),
            'name' => $request->nm_pegawai,
            'email' => $request->email,
            'password' => bcrypt('password'),
            'level' => 'operator',
        ]);

        $last_id_user = User::latest('id_users')->first()->id_users;

        $request->request->add([
            'id_users' => $last_id_user,
            'kd_pegawai' => 'PGW'.Str::upper(Str::random(4)), 
        ]);
        Pegawai::create($request->all());
        return redirect()->route('admin.pegawai.index')->with('success','Data berhasil ditambah');
    }

    public function show(Pegawai $pegawai)
    {
        return view('admin.pegawai.show',compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        return view('admin.pegawai.edit',compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {   
        $pegawai->update($request->all());
        return redirect()->route('admin.pegawai.index')->with('success','Data berhasil diupdate');
    }

    public function destroy(Pegawai $pegawai)
    {   
        $pegawai->delete();
        return redirect()->route('admin.pegawai.index')->with('success','Data berhasil dihapus');
    }
}
