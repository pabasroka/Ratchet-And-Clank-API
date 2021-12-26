<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $with = ['releases', 'platforms'];

    protected $fillable =[
        'title',
        'subtitle',
        'image',
        'developers',
        'directors',
        'composer',
        'approve'
    ];

    public $timestamps = false;

    public const VALIDATION_RULES = [
        'title' => ['required', 'string', 'max:64'],
        'subtitle' => ['nullable', 'string', 'max:64'],
        'image'  => ['nullable', 'image', 'max:5048'],
        'developers' => ['nullable', 'string', 'max:32'],
        'directors' => ['nullable', 'string', 'max:32'],
        'composer' => ['nullable', 'string', 'max:32'],
        'approve' => ['boolean', 'nullable'],
    ];

    // Relationships
    public function releases() {
        return $this->hasMany(Release::class, 'game_id', 'id');
    }

    public function platforms() {
        return $this->hasMany(Platform::class, 'game_id', 'id');
    }

}
