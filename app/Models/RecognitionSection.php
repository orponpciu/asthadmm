<?php

namespace App\Models;

   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;

   class RecognitionSection extends Model
   {
       use HasFactory;

       protected $fillable = [
           'section_title',
           'platforms',
           'is_active',
       ];

       // Crucial for Filament Repeaters to work with JSON columns
       protected $casts = [
           'platforms' => 'array', 
       ];
   }