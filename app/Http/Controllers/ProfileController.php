<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function edit(Request $request){
        // return $request->file('image')->store('gambar');

        $profile = User::find($request->user_id);
        $profile->user_id = $request->user_id;
        $profile->name = $request->name;
        $profile->password = $request->password;
        $profile->no_hp = $request->no_hp;
        $profile->email = $request->email;
        $profile->flag_active = $request->flag_active;

        if($request->file('image')){
            $profile->image = $request->file('image')->store('gambar');
        }

        $profile->update();

        return redirect('/profile')->with('success', 'Data Profile Berhasil Diperbaharui !!!');
    }
}
