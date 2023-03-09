<?php

namespace App\Models;

use App\Models\User;
use App\Models\Classes;
use App\Models\Semester;
use App\Models\NotesFolder;
use App\Models\ExaminationMark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'title',
        'code',
        'credit',
        'status'
    ];

    public function notes_folder()
    {
        return $this->hasOne(NotesFolder::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'class_courses', 'course_id', 'class_id');
    }

    public function lecturers()
    {
        return $this->belongsToMany(User::class);
    }

    public function semester()
    {
        return $this->hasOne(Semester::class);
    }
}
