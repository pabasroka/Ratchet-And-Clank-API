<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'cover',
        'developers',
        'directors',
        'composer',
    ];

    protected $casts = [
        'release' => 'array',
    ];

}
