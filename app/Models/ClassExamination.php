<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassExamination extends Model
{
    use HasFactory; 

    protected $table = 'class_examinations';
    
    protected $fillable = [
        'class_id',
        'examination_id'
    ];
}
