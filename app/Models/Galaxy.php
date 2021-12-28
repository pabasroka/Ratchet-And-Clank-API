<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galaxy extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $with = ['planets'];

    public $fillable = [
        'name',
        'approve'
    ];

    public const VALIDATION_RULES = [
        'approve' => ['boolean', 'nullable']
    ];

    public function planets() {
        return $this->hasMany(Planet::class, 'galaxy_id', 'id');
    }
}
