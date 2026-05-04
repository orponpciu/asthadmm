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
    Schema::create('site_settings', function (Blueprint $table) {
        $table->id();
        $table->string('favicon')->nullable();
        $table->string('logo')->nullable();
        $table->json('nav_links')->nullable(); // To store dynamic menu items
        $table->string('cta_text')->nullable()->default('CALL NOW ➔');
        $table->string('cta_link')->nullable()->default('#');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
