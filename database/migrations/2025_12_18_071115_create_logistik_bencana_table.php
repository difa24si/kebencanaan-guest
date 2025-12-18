<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('logistik_bencana', function (Blueprint $table) {
            $table->id('logistik_id');

            $table->unsignedBigInteger('kejadian_id');
            $table->foreign('kejadian_id')
                  ->references('kejadian_id')
                  ->on('kejadian_bencana')
                  ->onDelete('cascade');

            $table->string('nama_barang');
            $table->string('satuan', 50);
            $table->integer('stok');
            $table->string('sumber');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logistik_bencana');
    }
};
