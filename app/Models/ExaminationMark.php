<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Examination;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExaminationMark extends Model
{
    use HasFactory;

    protected $table = 'examination_marks';

    protected $fillable = [
        'score',
        'student_id',
        'course_id',
        'grade_id',
        'class_id',
        'programme_id',
        'semester_id',
        'examination_id',
        'academic_year_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
