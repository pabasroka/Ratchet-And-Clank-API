<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'subtitle',
        'image',
        'developers',
        'directors',
        'composer',
    ];

    public $timestamps = false;

    public const VALIDATION_RULES = [
        'title' => ['required', 'string', 'max:64'],
        'subtitle' => ['nullable', 'string', 'max:64'],
        'image'  => ['nullable', 'image', 'max:5048'],
        'developers' => ['nullable', 'string', 'max:32'],
        'directors' => ['nullable', 'string', 'max:32'],
        'composer' => ['nullable', 'string', 'max:32'],
    ];

}
