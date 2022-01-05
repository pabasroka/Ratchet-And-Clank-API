<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeaponEvolution extends Model
{
    use HasFactory;

    protected $table = "weapons_evolution";

    public $timestamps = false;

    protected $fillable = [
        'weapon_id',
        'name',
        'max_level',
        'price',
        'range',
        'rate_of_fire',
        'image',
        'approve',
    ];

    public const VALIDATION_RULES = [
        'approve' => ['boolean', 'nullable']
    ];
}
