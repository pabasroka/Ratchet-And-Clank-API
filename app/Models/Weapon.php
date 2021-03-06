<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $with = 'weaponsEvolution';

    protected $fillable = [
        'game_id',
        'name',
        'price',
        'range',
        'rate_of_fire',
        'image',
        'approve',
    ];

    public const VALIDATION_RULES = [
        'approve' => ['boolean', 'nullable']
    ];

    public function weaponsEvolution() {
        return $this->hasMany(WeaponEvolution::class, 'weapon_id', 'id');
    }
}
