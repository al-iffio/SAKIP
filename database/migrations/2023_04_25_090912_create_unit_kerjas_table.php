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
        Schema::create('unit_kerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ikuUnitKerja_id');
            $table->char('kodeWilayah', 2);
            $table->char('kodeUnitKerja', 4)->unique();
            $table->string('wilayah', 3);
            $table->string('namaUnitKerja')->unique();
            $table->string('namaPIC')->nullable();
            $table->string('noTelpPIC')->nullable();
            $table->string('role');
            $table->char('kodeSatkerProv', 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_kerjas');
    }
};
