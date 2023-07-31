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
        Schema::create('sasaran_ikus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ikuUnitKerja_id');
            $table->foreignId('tujuanIku_id')
                ->constrained(table: 'tujuan_ikus', indexName: 'tujuanIku_id')
                ->cascadeOnDelete();
            $table->char('kodeSasaran', 3);
            $table->string('sasaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sasaran_ikus');
    }
};
