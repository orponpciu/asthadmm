<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass-assignable.
     * Using an empty guarded array allows Filament to save all fields seamlessly,
     * including 'seo_title' and 'seo_description'.
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        // The Builder field stores all sections (hero, faqs, promises) as JSON in this one column
        'content' => 'array',
        
        // TagsInput saves as JSON, so it must be cast back to a PHP array
        'seo_keywords' => 'array',
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