<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class enrollment extends Model
{
    protected $table = "enrollments";
    protected $primaryKey = "id";
    protected $fillable = ['subject_id', 'student_id', 'enroll_start_date', 'enroll_end_date','status', 'grade'];

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
}
