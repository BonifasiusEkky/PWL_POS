<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Usermodel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Termwind\Components\Hr;

class Usercontroller extends Controller
{
    public function index()
    {
        $user = Usermodel::with('level')->get();
        dd($user);
    }
    public function tambah()
    {
        return view('user_tambah');
    }
    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = Usermodel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->username);
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }
    public function hapus($id)
    {
        $user = Usermodel::find($id);
        $user->delete();

        return redirect('/user');
    }
}
