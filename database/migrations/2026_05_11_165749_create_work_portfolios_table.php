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
    Schema::create('work_portfolios', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique();
        $table->string('tagline')->default('Case Study');
        $table->text('description');
        $table->json('services_tags')->nullable(); // Stores as array
        $table->json('stats')->nullable();         // Stores repeater data
        $table->json('execution_steps')->nullable(); // Stores repeater data
        $table->string('hero_image')->nullable();
        $table->string('cta_link')->default('#');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_portfolios');
    }
};
