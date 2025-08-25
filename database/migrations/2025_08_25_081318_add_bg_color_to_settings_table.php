<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            // tambahin kolom bg_color
            if (!Schema::hasColumn('settings', 'bg_color')) {
                $table->string('bg_color', 20)->nullable()->default('#1e40af');
            }
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('bg_color');
        });
    }
};
