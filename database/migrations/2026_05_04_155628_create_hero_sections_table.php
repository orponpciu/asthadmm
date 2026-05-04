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
    Schema::create('hero_sections', function (Blueprint $table) {
        $table->id();
        $table->boolean('is_active')->default(true); // Toggle to show/hide section
        $table->string('headline')->nullable();
        $table->string('subheadline')->nullable();
        $table->json('stats')->nullable();    // Repeater for the number counters
        $table->json('partners')->nullable(); // Repeater for the partner logos
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
