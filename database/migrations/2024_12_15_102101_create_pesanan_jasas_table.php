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
        Schema::create('pesanan_jasas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengguna');
            $table->unsignedBigInteger('id_jasa');
            $table->integer('berat');
            $table->date('tanggal_pesanan');
            $table->date('tanggal_selesai');
            $table->integer('total_harga');
            $table->string('metode_pembayaran');
            $table->string('bukti_bayar');
            $table->string('status_pembayaran');
            $table->date('tanggal_pembayaran');
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id')->on('penggunas')->onDelete('cascade');
            $table->foreign('id_jasa')->references('id')->on('jasas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_jasas');
    }
};