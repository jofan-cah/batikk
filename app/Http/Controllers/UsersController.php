<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class UsersController extends Controller
{

    public function index()
    {
        $User = User::all();

        return view('users/index', ['user' => $User]);
    }

    public function tambah()
    {
        return view('users.form');
    }
    public function simpan(Request $request)
    {

        FacadesValidator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required'

        ])->validate();



        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);

        return redirect()->route('users');
    }

    public function update($id, Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'level' => $request->level,
        ];

        ModelStok::find($id)->update($data);

        return redirect()->route('users');
    }
    public function edit($id)
    {

        $user = User::find($id);

        return view('users.form', ['user' => $user]);
    }
    public function hapus($id)
    {
        User::find($id)->delete();

        return redirect()->route('users');
    }
}
