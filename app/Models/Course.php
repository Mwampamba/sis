<?php

namespace App\Models;

use App\Models\User;
use App\Models\Classes;
use App\Models\ExaminationMark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    
    protected $fillable = [
        'name',
        'code',
        'credit',
        'status'
    ];

    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }

    public function lecturers()
    {
        return $this->belongsToMany(User::class);
    }

    public function examination_marks()
    {
        return $this->hasMany(ExaminationMark::class);
    }
}
