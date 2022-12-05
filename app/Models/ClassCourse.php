<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCourse extends Model
{
    use HasFactory;

    protected $table = 'classes_course';
    
    protected $fillable = [
        'classes_id',
        'course_id'
    ];
}
