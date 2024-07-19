<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

Hash ::make('password');

class UserController extends Controller
{
    //
    public function index(){

        $user = User::where('id', Auth::user()->id)->first();
        return view('user.index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->hasFile('foto')) {
            $image_path = "images/" . $user->foto;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $fileFoto = $request->name.''.Auth::user()->id .'(' . time() . ')'. '.' . $ext;
            $destination = 'images/';
            $file->move($destination, $fileFoto);
        } else {
            $fileFoto = $user->foto;
        }
        $adduser = User::find($id);
        $adduser->name = $request->name;
        $adduser->level = $request->level;
        $adduser->email = $request->email;
        $adduser->foto = $fileFoto;
        $adduser->no_hp = $request->no_hp;
        $adduser->address = $request->address;
        $adduser->marketing = $request->marketing;
        $adduser->jenis_institusi = $request->jenis_institusi;

            // Cek apakah password baru diisi
            if ($request->filled('password')) {
                $adduser->password = Hash::make($request->password);
            }
        $adduser->save();
        
        return back()->with(['success' => '<strong>'.'Profil ' . $user->name . '</strong>' . ' Telah DiPerbarui.']);
    }
}
