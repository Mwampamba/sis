<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Collage;
use App\Models\Student;
use App\Models\Programme;
use App\Models\Examination;
use App\Models\AcademicYear;
use App\Models\ExaminationMark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';

    protected $fillable = [
        'name',
        'collage_id',
        'programme_id',
        'academic_year_id'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'class_courses', 'class_id', 'course_id');
    }

    public function exams()
    {
        return $this->belongsToMany(Examination::class, 'class_examinations', 'class_id', 'examination_id');
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function collage()
    {
        return $this->belongsTo(Collage::class);
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function examination_marks()
    {
        return $this->hasMany(ExaminationMark::class);
    }
}
