<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $table = "games";

    protected $fillable =[
        'title',
        'subtitle',
        'cover',
        'release',
        'platforms',
        'developers',
        'directors',
        'composer',
    ];

//    protected $casts = [
//        'release' => 'array',
//        'platforms' => 'array',
//    ];

}
