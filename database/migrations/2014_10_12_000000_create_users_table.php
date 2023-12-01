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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Instead of id_alumni INT PRIMARY KEY
            $table->string('name', 50);
            $table->string('email', 50);
            $table->string('password');
            $table->string('no_hp', 15)->nullable();
            $table->string('nim', 50)->nullable();
            $table->integer('tahun_lulus')->nullable();
            $table->string('program_studi', 50)->nullable();
            $table->decimal('ipk', 3, 2)->nullable();
            $table->integer('role')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
