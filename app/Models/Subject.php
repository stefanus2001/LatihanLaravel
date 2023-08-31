<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";
    protected $primaryKey = 'subject_id';
    public $incrementing = false;
    protected $fillable = ['subject_id', 'subject_name', 'credit', 'subject_pre_required', 'flag_active'];

    public function enrollment()
    {
       return $this->hasMany(Enrollment::class, 'subject_id');
    }
}
