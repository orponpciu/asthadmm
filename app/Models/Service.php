<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass-assignable.
     * Use guarded empty to allow Filament to save all fields.
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     * This ensures the JSON from Filament is handled as a PHP array.
     */
    protected $casts = [
        'content' => 'array',
        'seo_keywords' => 'array',
        
        // Keep these only if you are using separate columns for them, 
        // otherwise the 'content' cast above covers all builder blocks.
        'feature_blocks' => 'array',
        'faqs'           => 'array',
        'promises'       => 'array',
    ];

    /**
     * Get the route key for the model.
     * This allows Laravel to use the slug instead of ID in URLs automatically.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}