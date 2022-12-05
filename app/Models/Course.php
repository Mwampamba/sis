<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\ClassCourse;
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
        return $this->belongsToMany('App\Models\Classes');
    }
}
