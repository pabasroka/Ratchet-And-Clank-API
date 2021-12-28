<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    protected $table = 'plantes';

    public $timestamps = false;

    public $fillable = [
        'name',
        'description',
        'image',
        'approve'
    ];

    protected $hidden = [
        'galaxy_id',
    ];

    public const VALIDATION_RULES = [
        'galaxy_id' => ['integer'],
        'name' => ['required', 'string', 'max:32'],
        'description' => ['nullable', 'string', 'max:500'],
        'image'  => ['nullable', 'image', 'max:5048'],
        'approve' => ['boolean', 'nullable']
    ];
}
