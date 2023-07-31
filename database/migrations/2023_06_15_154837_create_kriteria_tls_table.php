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
        Schema::create('kriteria_tls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokumenTL_id')
                ->constrained(table: 'dokumen_tls', indexName: 'dokumenTL_id')
                ->cascadeOnDelete();
            $table->foreignId('kriteriaLKE_id')
                ->constrained(table: 'kriteria_lkes', indexName: 'kriteriaLke_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria_tls');
    }
};
