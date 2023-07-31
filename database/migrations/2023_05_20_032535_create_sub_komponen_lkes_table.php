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
        Schema::create('sub_komponen_lkes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('komponenLke_id')
                ->constrained(table: 'komponen_lkes', indexName: 'komponenLke_id')
                ->cascadeOnDelete();
            $table->string('kodeSubKomponen')->unique();
            $table->string('namaSubKomponen')->unique();
            $table->double('persentaseNilaiSub');
            $table->string('bobotPerKriteria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_komponen_lkes');
    }
};
