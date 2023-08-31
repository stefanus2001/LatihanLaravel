<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login', [
            'title' => 'login'
        ]);
    }

    public function login(Request $request){
        $validateData = $request->validate([
            'user_id' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($validateData)){
            $request->session()->regenerate();
            return redirect()->intended('/student');
        }

        return back()->with('error', 'Login gagal !! User ID atau Password salah !!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/student');
    }
}
