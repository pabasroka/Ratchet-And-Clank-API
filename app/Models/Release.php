<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $hidden = [
        'game_id',
        'approve',
    ];

    public const VALIDATION_RULES = [
        'game_id' => ['nullable', 'integer'],
        'region' => ['nullable', 'array'],
        'region.*' => ['string'],
        'date' => ['nullable', 'array'],
        'date.*' => ['date'],
        'approve' => ['boolean', 'nullable']
    ];
}
