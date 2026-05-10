<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_sections', function (Blueprint $table) {
            // Adding the missing column as nullable so old records don't break
            $table->string('custom_link')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('service_sections', function (Blueprint $table) {
            $table->dropColumn('custom_link');
        });
    }
};