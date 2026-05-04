<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandSetting extends Model
{
    protected $fillable = [
        'is_active',
        'brands',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'brands' => 'array',
    ];
}