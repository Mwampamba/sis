<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Collage;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';
    
    protected $fillable = [
        'name',
        'collage_id',
        'academic_year_id'
    ];

    public function collage()
    {
        return $this->belongsTo(Collage::class);
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course');
    }
}
