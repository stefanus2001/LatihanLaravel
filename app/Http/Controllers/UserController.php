<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('flag_active', 1)->orderBy("user_id", "asc")->get();

        return view('user', [
            'users' =>  $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'flag_active' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/user')->with('success', 'Data User Berhasil Ditambahkan !!!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit(Request $request)
    {
        $user = User::find($request->user_id);
        $user->user_id = $request->user_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->flag_active = $request->flag_active;
        $user->update();

        return redirect('/user')->with('success', 'Data User Berhasil Diperbaharui !!!');
    }

    public function hapus(Request $id){
        $user = User::find($id->user_id);
        $user->flag_active = 2;
        $user->update();

        return redirect('/user')->with('success', 'Data User Berhasil Dihapus !!!');
    }
}
