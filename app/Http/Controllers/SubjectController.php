<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subject = Subject::where('flag_active', 1)->orderBy("subject_id", "asc")->get();

        return view('subject', [
            'subjects' =>  $subject
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'subject_id' => 'required',
            'subject_name' => 'required',
            'credit' => 'required',
            'subject_pre_required' => 'required',
        ]);

        Subject::create($validatedData);

        return redirect('/subject')->with('success', 'Data Subject Berhasil Ditambahkan !!!');
    }

    public function edit(Request $request)
    {
        $subject = Subject::find($request->subject_id);
        $subject->subject_id = $request->subject_id;
        $subject->subject_name = $request->subject_name;
        $subject->credit = $request->credit;
        $subject->subject_pre_required = $request->subject_pre_required;
        $subject->update();

        return redirect('/subject')->with('success', 'Data Subject Berhasil Diperbaharui !!!');
    }

    public function hapus(Request $id){
        $subject = Subject::find($id->subject_id);
        $subject->flag_active = 2;
        $subject->update();

        return redirect('/subject')->with('success', 'Data Subject Berhasil Dihapus !!!');
    }
}
