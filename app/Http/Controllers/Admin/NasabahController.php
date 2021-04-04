<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\NasabahDeleteEvent;

use App\Models\Nasabah;
use App\Models\Rekening;
use App\Models\User;
use Str;
use DB;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabah = Nasabah::get();
        return view('admin.nasabah.index',compact('nasabah'));
    }

    public function create()
    {
        return view('admin.nasabah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'unique:users',
            'email' => 'unique:users',
        ]);

        DB::transaction(function() use($request){
            User::create([
                'username' => Str::lower($request->username),
                'name' => $request->nm_nasabah,
                'password' => bcrypt('password'),
                'email' => $request->email,
                'level' => 'nasabah',
            ]);

            $user = User::latest('id_users')->first();

            $request->request->add([
                'kd_nasabah' => 'NSB'.Str::upper(Str::random(4)),
                'id_users' => $user->id_users,
            ]);
            
            Nasabah::create($request->all());
            
            $nasabah = Nasabah::latest('id')->first();

            Rekening::create([
                'no_rekening' => random_int(10000000, 99999999),
                'pin' => '123456',
                'saldo' => 0,
                'kd_nasabah' => $nasabah->kd_nasabah,
            ]);
        });

        return redirect()->route('admin.nasabah.index')->with('success','Data berhasil ditambah');
    }

    public function show(Nasabah $nasabah)
    {
        return view('admin.nasabah.show',compact('nasabah'));
    }

    public function edit(Nasabah $nasabah)
    {
        return view('admin.nasabah.edit',compact('nasabah'));
    }

    public function update(Request $request, Nasabah $nasabah)
    {   
        $nasabah->update($request->all());
        return redirect()->route('admin.nasabah.index')->with('success','Data berhasil diupdate');
    }

    public function destroy(Nasabah $nasabah)
    {
        event(new NasabahDeleteEvent($nasabah));
        $nasabah->delete();
        return redirect()->route('admin.nasabah.index')->with('success','Data berhasil dihapus');
    }
}