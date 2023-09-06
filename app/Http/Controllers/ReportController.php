<?php

namespace App\Http\Controllers;

use App\Exports\Report;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $year= $request->year_entrance;
        $subject = $request->subject_name;
        $student = $request->student_name;

        $db = DB::table('enrollments')
                ->join('subjects','enrollments.subject_id', '=' , 'subjects.subject_id')
                ->join('students','enrollments.student_id', '=' , 'students.student_id');
                if(!empty($year)){
                    $db->where('year_entrance', '=', $year);
                }
                if(!empty($subject)){
                    $db->where('subject_name', '=', $subject);
                }
                if(!empty($student)){
                    $db->where('student_name', '=', $student);
                }
        $reports = $db->get();


        return view('report', [
            'reports' => $reports,
            'subjects' => Subject::select("subject_name")->distinct()->get(),
            'students' => Student::select("student_name")->distinct()->get(),
            'years' => Student::select("year_entrance")->orderBy("year_entrance", "asc")->distinct()->get(),
            'oldYear' => $year,
            'oldSubject' => $subject,
            'oldStudent' => $student
        ]);

    }

    public function export(Request $request){
        return Excel::download(new Report($request->year_entrance, $request->subject_name, $request->student_name),"report.xlsx");
    }
}


