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
        Schema::create('tim_at_satkers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('timDalnisKT_id')
                ->constrained(table: 'tim_dalnis_kts', indexName: 'timDalnisKT_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('at_id')
                ->constrained(table: 'pegawais', indexName: 'at_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('unitKerja_id')
                ->constrained(table: 'unit_kerjas', indexName: 'unitKerja_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tim_at_satkers');
    }
};
