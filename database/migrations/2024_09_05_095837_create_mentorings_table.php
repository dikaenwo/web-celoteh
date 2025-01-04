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
        Schema::create('mentorings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas');
            $table->string('cover');
            $table->time('jam_mulai');
            $table->time('jam_berakhir');
            $table->string('jadwal');
            $table->string('nama_mentor');
            $table->text('deskripsi');
            $table->date('tanggal_mulai');
            $table->string('bidang_kelas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentorings');
    }
};
