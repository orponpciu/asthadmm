<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    // Add fillable fields so Filament can save data successfully
    protected $fillable = [
        'quote',
        'author',
        'role',
        'company',
        'sort_order',
    ];
}