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
        Schema::create('kriteria', function (Blueprint $table) {
        $table->id();
        $table->string('kode', 10)->unique();
        $table->string('nama_kriteria', 100);
        $table->decimal('bobot', 4, 2);
        $table->enum('tipe', ['benefit', 'cost']);
        $table->boolean('status')->default(1);
        $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriterias');
    }
};
