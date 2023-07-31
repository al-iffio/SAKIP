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
        Schema::create('kriteria_lkes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subKomponenLke_id')
                ->constrained(table: 'sub_komponen_lkes', indexName: 'subKomponenLke_id')
                ->cascadeOnDelete();
            $table->char('kodeKriteriaLKE')->unique();
            $table->string('namaKriteria')->unique();
            $table->double('bobotKriteria');
            $table->text('panduanEvaluator');
            $table->string('jenisPenilaian');
            $table->char('defaultNilai', 1)->nullable();
            $table->text('defaultCatatan')->nullable();
            $table->string('pilihanNilai')->nullable();
            $table->boolean('catatanPerNilai')->nullable();
            $table->text('catatanA')->nullable();
            $table->text('catatanB')->nullable();
            $table->text('catatanC')->nullable();
            $table->text('catatanD')->nullable();
            $table->text('catatanE')->nullable();
            $table->text('catatanY')->nullable();
            $table->text('catatanT')->nullable();
            $table->text('templateCatatan')->nullable();
            $table->foreignId('kriteriaKKE_id')->nullable()
                ->constrained(table: 'kriteria_kkes', indexName: 'kriteriaKKE_id')
                ->restrictOnDelete();
            $table->text('templateCatatanKKE')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria_lkes');
    }
};
