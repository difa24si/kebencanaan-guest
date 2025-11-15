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
                Schema::create('kejadian_bencana', function (Blueprint $table) {
            $table->id('kejadian_id'); // Primary Key

            // Kolom data
            $table->string('jenis_bencana');
            $table->date('tanggal');
            $table->text('lokasi_text')->nullable();

            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();

            $table->string('dampak')->nullable();
            $table->enum('status_kejadian', ['Ringan', 'Sedang', 'Berat', 'Selesai'])
                  ->default('Sedang');

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kejadian_bencana');
    }
};
