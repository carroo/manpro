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
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->id(); // Instead of id_riwayat INT PRIMARY KEY
            $table->foreignId('alumni_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_perusahaan', 50);
            $table->string('jabatan', 50);
            $table->decimal('gaji', 10, 2);
            $table->date('tanggal_mulai_pekerjaan');
            $table->date('tanggal_selesai_pekerjaan')->nullable();
            $table->string('alasan_berhenti')->nullable();
            $table->integer('rekomendasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaans');
    }
};
