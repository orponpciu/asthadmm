<?php

namespace App\Models;

   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;

   class AiSectionContent extends Model
   {
       use HasFactory;

       protected $fillable = [
           'title_white',
           'title_pink',
           'subtitle',
           'paragraph_1',
           'paragraph_2',
           'paragraph_3',
           'button_text',
           'button_link',
           'is_active',
       ];
   }