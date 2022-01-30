<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'time',
        'date',
        'file',
        'seen',
        'visit_id',
        'user_id',
    ];
    public function visit(){
        return $this->belongsTo(Visit::class, 'visit_id');
    }
}

				