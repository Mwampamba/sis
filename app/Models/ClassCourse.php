<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassCourse extends Model
{
    use HasFactory;

    protected $table = 'class_courses';
    
    protected $fillable = [
        'class_id',
        'course_id'
    ];

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }
}
