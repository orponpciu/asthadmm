<?php

use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   return new class extends Migration
   {
       public function up(): void
       {
           Schema::create('ai_section_contents', function (Blueprint $table) {
               $table->id();
               $table->string('title_white')->nullable(); // For "EXPLORE NEW HEIGHTS -"
               $table->string('title_pink')->nullable();  // For "STEP INTO THE AI DIGITAL WORLD"
               $table->string('subtitle')->nullable();    // For "Enhance AI visibility..."
               $table->text('paragraph_1')->nullable();
               $table->text('paragraph_2')->nullable();
               $table->text('paragraph_3')->nullable();
               $table->string('button_text')->default('GET IN TOUCH');
               $table->string('button_link')->nullable();
               $table->boolean('is_active')->default(true);
               $table->timestamps();
           });
       }

       public function down(): void
       {
           Schema::dropIfExists('ai_section_contents');
       }
   };