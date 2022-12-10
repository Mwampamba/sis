<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\ExamType;
use App\Models\Semester;
use App\Models\AcademicYear;
use App\Models\ExaminationMark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examination extends Model
{
    use HasFactory;
    protected $table = 'examinations';
    
    protected $fillable = [
        'exam_name',
        'exam_type_id',
        'semester_id',
        'academic_year_id',
        'starting_date',
        'ending_date',
        'description',
        'status'
    ];


    public function exam_type()
    {
        return $this->belongsTo(ExamType::class);
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }

    public function examination_marks()
    {
        return $this->hasMany(ExaminationMark::class);
    }
}
