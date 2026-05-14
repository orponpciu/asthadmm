<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $fillable = [
        'logo', 'tagline', 'social_links', 'quick_links_title', 
        'quick_links', 'services_title', 'services', 
        'contact_title', 'contact_items', 'map_url'
    ];

    protected $casts = [
        'social_links' => 'array',
        'quick_links' => 'array',
        'services' => 'array',
        'contact_items' => 'array',
    ];
}