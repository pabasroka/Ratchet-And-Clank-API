<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'name',
        'approve'
    ];

    public const VALIDATION_RULES = [
        'approve' => ['boolean', 'nullable']
    ];
}
