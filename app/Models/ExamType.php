<?php

namespace App\Models;

use App\Models\Examination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamType extends Model
{
    use HasFactory;
    
    protected $table = 'exam_types';
    
    protected $fillable = [
        'exam_type',
        'description',
        'status'
    ];

    public function examinations()
    {
        return $this->hasMany(Examination::class);
    }
}
