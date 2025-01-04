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
        Schema::create('uji_tampils', function (Blueprint $table) {
            $table->id();
            $table->string('judul_presentasi');
            $table->string('nama');
            $table->date('tanggal_presentasi');
            $table->text('deskripsi');
            $table->string('image');
            $table->text('zoom_link');
            $table->time('jam_tampil');
            $table->string('unique_code');
            $table->boolean('is_validate')->default(false);
            $table->timestamps();
            $table->foreignId('author_id')->constrained(
                table: 'users', indexName: 'user_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uji_tampils');
    }
};
