<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillPoint extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'game_id',
        'planet_id',
        'name',
        'description',
        'approve'
    ];

    const VALIDATION_RULES = [
        'approve' => ['boolean', 'nullable']
    ];
}
