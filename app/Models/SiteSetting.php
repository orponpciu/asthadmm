<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'favicon',
        'logo',
        'nav_links',
        'cta_text',
        'cta_link',
    ];

    protected $casts = [
        'nav_links' => 'array',
    ];
}