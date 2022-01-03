<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Gadget extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $with = ['games'];

    protected $fillable = [
        'first_appearance',
        'name',
        'image',
        'approve'
    ];

    public const VALIDATION_RULES = [
        'approve' => ['boolean', 'nullable']
    ];

    public function games(): HasOne
    {
        return $this->hasOne(Game::class, 'id', 'first_appearance');
    }
}
