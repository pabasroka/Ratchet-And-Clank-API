<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Releases extends Model
{
    use HasFactory;

    public $timestamps = false;

    public const VALIDATION_RULES = [
        'game_id' => 'required|integer',
        'release' => 'date'
    ];
}
