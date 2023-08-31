<?php

namespace App\Http\Controllers;

use SoftDeletes;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::where('flag_active', 1)->orderBy("student_id", "asc")->get();

        return view('student', [
            'students' =>  $student
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'student_name' => 'required',
            'date_of_birth' => 'required',
            'year_entrance' => 'required',
        ]);

        Student::create($validatedData);

        return redirect('/student')->with('success', 'Data Student Berhasil Ditambahkan !!!');
    }

    public function edit(Request $request)
    {
        $student = Student::find($request->student_id);
        $student->student_id = $request->student_id;
        $student->student_name = $request->student_name;
        $student->date_of_birth = $request->date_of_birth;
        $student->year_entrance = $request->year_entrance;
        $student->update();

        return redirect('/student')->with('success', 'Data Student Berhasil Diperbaharui !!!');
    }

    public function hapus(Request $id){
        $student = Student::find($id->student_id);
        $student->flag_active = 2;
        $student->update();

        return redirect('/student')->with('success', 'Data Student Berhasil Dihapus !!!');
    }
}
