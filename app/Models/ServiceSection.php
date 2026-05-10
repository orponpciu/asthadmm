<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    /**
     * The attributes that are mass assignable.
     * These must match the names used in your database and Filament form.
     */
    protected $fillable = [
        'title',
        'description',
        'icon_svg',
        'custom_link',
        'sort_order',
    ];
}