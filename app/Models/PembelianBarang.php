<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBarang extends Model
{

    use HasFactory;

    protected $table = 'pembelian_barangs';
    public $timestamps = false;

    protected $fillable = [
        'id_pengguna', 'id_barang', 'jumlah_barang', 'total_harga', 'tanggal_pembelian', 'metode_pembayaran', 'bukti_bayar', 'status_pembayaran', 'tanggal_pembayaran',
    ];

    public function pengguna(){
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}
