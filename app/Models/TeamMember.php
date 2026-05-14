<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $guarded = []; // Allows all fields to be mass-assigned

    // This is required for Filament Repeaters and Blade loops
    protected $casts = [
        'members' => 'array',
    ];
}