<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    public $timestamps = false;

    public const VALIDATION_RULES = [
        'game_id' => ['nullable', 'integer'],
        'platform' => ['nullable', 'string', 'max:8'],
    ];
}
