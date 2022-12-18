<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LecturerCourse extends Model
{
    use HasFactory;
    protected $table = 'course_user';
    
    protected $fillable = [
        'course_id',
        'user_id'
    ];
}
