<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{

    use HasFactory;

    protected $table = 'barangs';
    public $timestamps = false;

    protected $fillable = [
        'nama_barang', 'stok', 'harga_barang',
    ];

    public function pesananBarangs()
    {
        return $this->hasMany(PesananBarang::class);
    }
}