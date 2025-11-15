<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi: buat tabel posko_bencana
     */
    public function up(): void
    {
        Schema::create('posko_bencana', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kejadian_id')->nullable()->comment('Relasi ke tabel kejadian');
            $table->string('nama', 100);
            $table->text('alamat');
            $table->string('kontak', 20);
            $table->string('penanggung_jawab', 100);
            $table->string('foto')->nullable();
            $table->timestamps();

            // Jika ada tabel kejadian, aktifkan relasi berikut:
             $table->foreign('kejadian_id')->references('kejadian_id')->on('kejadian')->onDelete('set null');
        });
    }

    /**
     * Rollback migrasi: hapus tabel posko_bencana
     */
    public function down(): void
    {
        Schema::dropIfExists('posko_bencana');
    }
};
