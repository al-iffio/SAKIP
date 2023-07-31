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
        Schema::create('kriteria_kkes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kke_id')
                ->constrained(table: 'kkes', indexName: 'kke_id')
                ->cascadeOnDelete();
            $table->char('kodeKriteriaKKE', 2)->unique();
            $table->string('kriteria');
            $table->string('nilaiRatarataIKU');
            $table->string('nilaiPerIKU');
            $table->boolean('tujuan');
            $table->boolean('sasaran');
            $table->boolean('indikator');
            $table->string('panduanEvaluator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria_kkes');
    }
};
