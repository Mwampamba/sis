<?php

namespace App\Models; 

use App\Models\Classes;
use App\Models\Collage;
use App\Models\Programme;
use App\Models\ExaminationMark;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'reg_number',
        'class_id',
        'programme_id',
        'collage_id',
        'password',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function collage()
    {
        return $this->belongsTo(Collage::class);
    }

    public function examination_marks()
    {
        return $this->hasMany(ExaminationMark::class);
    }
}
