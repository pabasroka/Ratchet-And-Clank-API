<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'game_id',
        'galaxy_id',
        'race_id',
        'name',
        'gender',
        'state',
        'eyes',
        'skin',
        'hair',
        'image',
        'approve'
    ];


    public const VALIDATION_RULES = [
        'approve' => ['boolean', 'nullable']
    ];
}
