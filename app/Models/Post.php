<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_category_id',
        'title',
        'slug',
        'featured_image',
        'featured_image_alt', // Added the new alt text field here
        'content',
        'published_at',
        'is_published',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'meta_keywords' => 'array',
        'published_at' => 'date',
    ];

    // Relationship to the Category
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }
}