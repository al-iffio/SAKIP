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
        Schema::create('tim_dalnis_kts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dalnis_id')
                ->constrained(table: 'pegawais', indexName: 'dalnis_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kt_id')
                ->constrained(table: 'pegawais', indexName: 'kt_id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tim_dalnis_kts');
    }
};
