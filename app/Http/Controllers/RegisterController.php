<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('daftar', [
            'title' => 'register'
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5',
            'flag_active' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        return redirect("/login")->with("success", "Pendaftaran Akun Berhasil !! Silahkan Login !!");
    }
}
