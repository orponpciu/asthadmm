<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
    ];

    // Add this inside the PostCategory class
    public function posts()
    {
        return $this->hasMany(Post::class, 'post_category_id');
    }
}