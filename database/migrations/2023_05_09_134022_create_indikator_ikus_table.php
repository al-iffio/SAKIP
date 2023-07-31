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
        Schema::create('indikator_ikus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ikuUnitKerja_id');
            $table->foreignId('sasaranIku_id')
                ->constrained(table: 'sasaran_ikus', indexName: 'sasaranIku_id')
                ->cascadeOnDelete();               
            $table->char('kodeIndikator', 4);
            $table->string('indikator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_ikus');
    }
};
