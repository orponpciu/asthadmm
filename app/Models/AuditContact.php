<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditContact extends Model
{
    use HasFactory;

    // Define which attributes are mass assignable
    protected $fillable = [
        'full_name',
        'email',
        'company_name',
        'mobile_number',
    ];
}