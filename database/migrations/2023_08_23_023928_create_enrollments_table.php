<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('subject_id',20);
            $table->foreign("subject_id")->references("subject_id")->on("subjects");
            $table->string('student_id',20);
            $table->foreign("student_id")->references("student_id")->on("students");
            $table->date('enroll_start_date');
            $table->date('enroll_end_date');
            $table->string('status',20);
            $table->string('grade',1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
