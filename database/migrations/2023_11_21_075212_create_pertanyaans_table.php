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
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->id(); // Instead of id_pertanyaan INT PRIMARY KEY
            $table->foreignId('kuesioner_id')->constrained('kuesioner')->onDelete('cascade');
            $table->string('jenis');
            $table->text('pertanyaan');
            $table->text('pilihan_jawaban')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaans');
    }
};
