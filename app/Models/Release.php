<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    use HasFactory;

    public $timestamps = false;

    public const VALIDATION_RULES = [
        'game_id' => ['nullable', 'integer'],
        'region' => ['nullable', 'string'],
        'date' => ['nullable', 'date']
    ];
}
