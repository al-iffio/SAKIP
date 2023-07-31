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
        Schema::create('komponen_lkes', function (Blueprint $table) {
            $table->id();
            $table->char('kodeKomponen', 1)->unique();
            $table->string('namaKomponen')->unique();
            $table->double('persentaseNilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komponen_lkes');
    }
};
