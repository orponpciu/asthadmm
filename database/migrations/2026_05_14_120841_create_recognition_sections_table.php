<?php

use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   return new class extends Migration
   {
       public function up(): void
       {
           Schema::create('recognition_sections', function (Blueprint $table) {
               $table->id();
               $table->string('section_title')->default('RECOGNIZED BY LEADING INDUSTRY PLATFORMS');
               $table->json('platforms')->nullable(); // This will store our repeating logos/links
               $table->boolean('is_active')->default(true);
               $table->timestamps();
           });
       }

       public function down(): void
       {
           Schema::dropIfExists('recognition_sections');
       }
   };