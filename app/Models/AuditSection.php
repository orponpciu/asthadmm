<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditSection extends Model
{
    protected $guarded = [];

    protected $casts = [
        'active_icons' => 'array',
    ];
}