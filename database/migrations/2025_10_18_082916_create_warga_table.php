<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('warga', function (Blueprint $table) {
        $table->increments('warga_id'); // Primary Key
        $table->string('no_ktp', 20)->unique(); // Nomor KTP unik
        $table->string('nama', 100); // Nama lengkap
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // Pilihan gender
        $table->string('agama', 50); // Nama agama
        $table->string('pekerjaan', 100)->nullable(); // Bisa kosong
        $table->string('telp', 20)->nullable(); // Nomor telepon opsional
        $table->string('email', 100)->unique()->nullable(); // Email unik tapi bisa kosong
        $table->timestamps(); // created_at & updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
