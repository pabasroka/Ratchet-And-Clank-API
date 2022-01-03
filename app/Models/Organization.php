<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'galaxy_id',
        'name',
        'description',
        'image',
        'approve'
    ];

    public const VALIDATION_RULES = [
        'approve' => ['boolean', 'nullable']
    ];
}
