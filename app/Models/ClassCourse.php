<?php

namespace App\Models;

use App\Models\Programme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassCourse extends Model
{
    use HasFactory;

    protected $table = 'class_course';
    
    protected $fillable = [
        'class_id',
        'course_id'
    ];

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
}
