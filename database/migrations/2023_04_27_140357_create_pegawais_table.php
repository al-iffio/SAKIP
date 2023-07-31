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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->char('nip', 18)->unique();
            $table->string('namaPegawai')->unique();
            $table->string('role');
            $table->foreignId('satker_id')
                ->nullable()
                ->unique()
                ->constrained(table: 'unit_kerjas', indexName: 'satker_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
