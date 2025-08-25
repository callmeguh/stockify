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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // Nama aplikasi
            $table->string('app_name')->default('Nama Aplikasi');

            // Path ke file logo
            $table->string('logo', 2048)->nullable();

            // Path ke file favicon (opsional)
            $table->string('favicon', 2048)->nullable();

            // Deskripsi aplikasi
            $table->text('description')->nullable();

            $table->string('bg_color', 20)->nullable()->default('#1e40af');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
