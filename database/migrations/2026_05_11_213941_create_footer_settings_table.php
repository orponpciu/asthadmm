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
    Schema::create('footer_settings', function (Blueprint $table) {
        $table->id();

        // Brand Side
        $table->string('logo')->nullable();
        $table->string('tagline')->nullable();
        $table->json('social_links')->nullable(); // Array of {icon, url}

        // Quick Links
        $table->string('quick_links_title')->default('QUICK LINKS');
        $table->json('quick_links')->nullable(); // Array of {label, url}

        // Services
        $table->string('services_title')->default('SERVICES');
        $table->json('services')->nullable(); // Array of {label, url}

        // Contact Info
        $table->string('contact_title')->default('CONTACT US');
        $table->json('contact_items')->nullable(); // Array of {icon, label, value}
        $table->text('map_url')->nullable(); // For iframe src

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
    }
};
