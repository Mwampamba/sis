<?php

namespace App\Models;

use App\Models\Course;
use App\Models\NotesFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotesFolder extends Model
{
    use HasFactory;

    protected $table = 'notes_folders';
    protected $fillable = [
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function files()
    {
        return $this->hasMany(NotesFile::class);
    }
}
