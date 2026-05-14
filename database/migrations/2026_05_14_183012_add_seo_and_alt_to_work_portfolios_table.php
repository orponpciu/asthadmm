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
        Schema::table('work_portfolios', function (Blueprint $table) {
            // Add the alt text column right after the hero image
            $table->string('hero_image_alt')->nullable()->after('hero_image');

            // Add SEO columns at the end of the table
            $table->string('seo_title')->nullable()->after('cta_link');
            $table->text('seo_meta_description')->nullable()->after('seo_title');
            $table->json('focus_keywords')->nullable()->after('seo_meta_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('work_portfolios', function (Blueprint $table) {
            // Drops the columns if you ever need to rollback this specific migration
            $table->dropColumn([
                'hero_image_alt',
                'seo_title',
                'seo_meta_description',
                'focus_keywords',
            ]);
        });
    }
};