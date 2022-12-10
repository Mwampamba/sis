<?php

namespace App\Models;

use App\Models\Examination;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';
    
    protected $fillable = [
        'name',
        'academic_year_id',
        'description',
    ];

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function examination()
    {
        return $this->hasOne(Examination::class);
    }
}
