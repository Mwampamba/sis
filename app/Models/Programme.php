<?php

namespace App\Models;

use App\Models\Collage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programme extends Model
{
    use HasFactory;
    protected $table = 'programmes';
    
    protected $fillable = [
        'name',
        'collage_id',
        'description',
        'status'
    ];

    public function collage()
    {
        return $this->belongsTo(Collage::class);
    }
}
