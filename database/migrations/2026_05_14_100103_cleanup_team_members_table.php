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
        $columnsToDrop = ['name', 'role', 'image', 'facebook', 'twitter', 'linkedin', 'instagram'];

        foreach ($columnsToDrop as $column) {
            if (Schema::hasColumn('team_members', $column)) {
                $table->dropColumn($column);
            }
        }
    });
}

public function down(): void
{
    Schema::table('team_members', function (Blueprint $table) {
        // Reverse the drop if needed (though usually not necessary for a fix)
        $table->string('name')->nullable();
        $table->string('role')->nullable();
        $table->string('image')->nullable();
        // ... add others if you want full rollback capability
    });
}
};
