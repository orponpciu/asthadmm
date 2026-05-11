<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkPortfolio extends Model
{
    protected $fillable = [
        'title', 'slug', 'tagline', 'description', 
        'services_tags', 'stats', 'execution_steps', 
        'hero_image', 'cta_link'
    ];

    protected $casts = [
        'services_tags' => 'array',
        'stats' => 'array',
        'execution_steps' => 'array',
    ];
}