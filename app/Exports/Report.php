<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class Report implements FromCollection, WithMapping, WithHeadings
{

    protected $year_entrance;
    protected $subject_name;
    protected $student_name;

    function __construct($year_entrance, $subject_name, $student_name) {
        $this->year_entrance = $year_entrance;
        $this->subject_name = $subject_name;
        $this->student_name = $student_name;

 }

    public function collection()
    {
        $db = DB::table('enrollments')
                ->join('subjects','enrollments.subject_id', '=' , 'subjects.subject_id')
                ->join('students','enrollments.student_id', '=' , 'students.student_id');
                if(!empty($this->year_entrance)){
                    $db->where('year_entrance', '=', $this->year_entrance);
                }
                if(!empty($this->subject_name)){
                    $db->where('subject_name', '=', $this->subject_name);
                }
                if(!empty($this->student_name)){
                    $db->where('student_name', '=', $this->student_name);
                }
        $reports = $db->get();

        return $reports;

    }

    public function map($report): array{
        return[
            $report->subject_id,
            $report->subject_name,
            $report->student_id,
            $report->student_name,
            $report->year_entrance,
            $report->grade,
            $report->status
        ];
    }

    public function headings(): array{
        return [
            'Subject ID',
            'Subject Name',
            'Student ID',
            'Student Name',
            'Year',
            'Grade',
            'Status'

        ];
    }
}
