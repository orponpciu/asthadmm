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
    Schema::create('audit_sections', function (Blueprint $table) {
        $table->id();
        // Breaking the H2 into parts to keep your custom <span> styling intact
        $table->string('heading_start')->default('ASTHA DIGITAL MARKETING MANAGEMENT AGENCY WITH');
        $table->string('heading_highlight')->default('15+ YEARS');
        $table->string('heading_end')->default('OF DRIVING GROWTH');
        
        // Paragraphs
        $table->text('paragraph_one')->nullable();
        $table->text('paragraph_two')->nullable();
        
        // Button
        $table->string('button_text')->default('KNOW MORE');
        $table->string('button_url')->default('#');
        
        // Icons (Stored as JSON array to toggle them on/off)
        $table->json('active_icons')->nullable();
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_sections');
    }
};
