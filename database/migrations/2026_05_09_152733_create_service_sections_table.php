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
    Schema::create('service_sections', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->text('icon_svg'); // To store the raw SVG code
        $table->string('link')->nullable(); // For your manual link
        $table->integer('sort_order')->default(0); // Optional: to keep them in order
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_sections');
    }
};
