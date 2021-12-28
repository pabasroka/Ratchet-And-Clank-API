<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $hidden = [
        'game_id',
        'approve',
    ];

    public const VALIDATION_RULES = [
        'game_id' => ['nullable', 'integer'],
        'platform' => ['nullable', 'string', 'max:8'],
        'approve' => ['boolean', 'nullable']
    ];
}
