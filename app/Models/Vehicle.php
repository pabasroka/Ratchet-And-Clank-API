<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'game_id',
        'name',
        'image',
        'approve'
    ];

    const VALIDATION_RULES = [
        'approve' => ['boolean', 'nullable']
    ];
}
