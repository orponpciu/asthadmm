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
    Schema::table('team_members', function (Blueprint $table) {
        // Add the missing columns
        $table->string('section_title')->nullable()->after('id');
        $table->json('members')->nullable()->after('section_title');
    });
}

public function down(): void
{
    Schema::table('team_members', function (Blueprint $table) {
        $table->dropColumn(['section_title', 'members']);
    });
}
};
