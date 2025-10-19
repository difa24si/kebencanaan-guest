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
         Schema::create('posko_bencana', function (Blueprint $table) {
        $table->increments('posko_id'); // Primary Key
        $table->unsignedInteger('kejadian_id'); // Foreign Key ke tabel kejadian
        $table->string('nama', 100); // Nama posko
        $table->string('alamat', 150)->nullable(); // Alamat posko
        $table->string('kontak', 20)->nullable(); // Nomor kontak
        $table->string('penanggung_jawab', 100)->nullable(); // Nama penanggung jawab
        $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posko_bencana');
    }
};
