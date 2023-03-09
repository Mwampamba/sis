<?php

namespace App\Models;

use App\Models\NotesFolder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotesFile extends Model
{
    use HasFactory;
    protected $table = 'notes_files';

protected $fillable = [
'folder_id',
'name'
];

public function folder()
{
return $this->belongsTo(NotesFolder::class);
}
}
