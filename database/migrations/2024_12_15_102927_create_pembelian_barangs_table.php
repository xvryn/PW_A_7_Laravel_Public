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
        Schema::create('pembelian_barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengguna');
            $table->unsignedBigInteger('id_barang');
            $table->integer('jumlah_barang');
            $table->integer('total_harga');
            $table->date('tanggal_pembelian');
            $table->string('metode_pembayaran');
            $table->string('bukti_bayar');
            $table->string('status_pembayaran');
            $table->date('tanggal_pembayaran');
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id')->on('penggunas')->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_barangs');
    }
};