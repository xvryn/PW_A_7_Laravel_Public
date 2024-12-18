<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananJasa extends Model
{

    use HasFactory;

    protected $table = 'pesanan_jasas';
    public $timestamps = false;

    protected $fillable = [
        'id_pengguna', 'id_jasa', 'berat', 'tanggal_pesanan', 'tanggal_selesai', 'total_harga','metode_pembayaran', 'bukti_bayar', 'total_harga','metode_pembayaran','status_pembayaran','tanggal_pembayaran',
    ];

    public function pengguna(){
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id');
    }

    public function jasa(){
        return $this->belongsTo(Jasa::class, 'id_jasa', 'id');
    }
}
