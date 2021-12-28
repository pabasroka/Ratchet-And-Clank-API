<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'galaxy_id',
        'name',
        'approve'
    ];

    public const VALIDATION_RULES = [
        'galaxy_id' => ['integer'],
        'name' => ['required', 'string', 'max:32'],
        'approve' => ['boolean', 'nullable']
    ];
}
