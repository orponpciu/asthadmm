<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            
            // Basic Information
            $table->string('title');
            $table->string('slug')->unique(); // for the URL
            
            // SEO Information
            $table->string('seo_title')->nullable();
            $table->json('seo_keywords')->nullable(); // JSON needed for TagsInput
            $table->string('seo_description')->nullable();
            
            // Page Builder Content (Stores Hero, Features, FAQs, etc.)
            $table->json('content')->nullable(); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};