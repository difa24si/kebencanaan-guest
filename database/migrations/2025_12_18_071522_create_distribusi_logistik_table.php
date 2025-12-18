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
    Schema::create('distribusi_logistik', function (Blueprint $table) {
        $table->id('distribusi_id');

        $table->unsignedBigInteger('logistik_id');
        $table->unsignedBigInteger('posko_id');

        $table->foreign('logistik_id')
              ->references('logistik_id')
              ->on('logistik_bencana')
              ->onDelete('cascade');

        $table->foreign('posko_id')
              ->references('posko_id')
              ->on('posko_bencana')
              ->onDelete('cascade');

        $table->date('tanggal');
        $table->integer('jumlah');
        $table->string('penerima');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribusi_logistik');
    }
};
