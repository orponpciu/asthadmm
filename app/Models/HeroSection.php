<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'is_active',
        'headline',
        'subheadline',
        'stats',
        'partners',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'stats' => 'array',
        'partners' => 'array',
    ];
}