<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Semester;
use App\Models\Examination;
use App\Models\ExaminationMark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYear extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'academic_years';
    
    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    public function semester()
    {
        return $this->hasMany(Semester::class)->withTrashed();
    }

    public function class()
    {
        return $this->hasMany(Classes::class);
    }

    public function examinations()
    {
        return $this->hasMany(Examination::class);
    }

    public function examination_marks()
    {
        return $this->hasMany(ExaminationMark::class);
    }
}
