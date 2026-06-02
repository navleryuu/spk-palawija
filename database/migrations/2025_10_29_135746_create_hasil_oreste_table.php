<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasil_oreste', function (Blueprint $table) {
            $table->id();
            $table->string('alternatif');   // nama alternatif atau kode
            $table->decimal('nilai', 10, 4); // hasil perhitungan
            $table->timestamps(); // kalau mau simpan waktu input
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_oreste');
    }
};
