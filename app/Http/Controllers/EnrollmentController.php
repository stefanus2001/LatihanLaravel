<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Http\Requests\StoreenrollmentRequest;
use App\Http\Requests\UpdateenrollmentRequest;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('enrollment', [
            'enrollments' => Enrollment::orderBy("id", "asc")->get(),
            'subjects' => Subject::where('flag_active', 1)->orderBy("subject_id", "asc")->get(),
            'students' => Student::where('flag_active', 1)->orderBy("student_id", "asc")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'subject_id' => 'required',
            'student_id' => 'required',
            'enroll_start_date' => 'required',
            'enroll_end_date' => 'required',
            'status' => 'required',
            'grade' => 'required',
        ]);

        if($validatedData['enroll_start_date'] >= $validatedData['enroll_end_date'] ){
            return redirect('/enrollment')->with('error', 'Gagal menambahkan data !!! Tanggal Mulai harus diset sebelum tanggal Selesai!!!');;
        }else{
            Enrollment::create($validatedData);
            return redirect('/enrollment')->with('success', 'Data Enrollment Berhasil Ditambahkan !!!');
        }



    }
}
