<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Programme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collage extends Model
{
    use HasFactory;
    protected $table = 'collages';
    
    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    public function programme()
    {
        return $this->hasMany(Programme::class);
    }

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
