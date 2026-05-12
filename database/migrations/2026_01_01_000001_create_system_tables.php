<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Table para sa mga Estudyante
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id_no')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->timestamps();
        });

        // Table para sa mga Subjects
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_code')->unique();
            $table->string('subject_name');
            $table->string('instructor');
            $table->timestamps();
        });

        // Table para sa mga Assessments/Mapping
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id');
            $table->string('name'); // Midterm, Final, etc.
            $table->string('term');
            $table->integer('po_id')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('students');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('assessments');
    }
}; 