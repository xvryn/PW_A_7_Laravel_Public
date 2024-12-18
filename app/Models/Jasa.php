<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{

    use HasFactory;

    protected $table = 'jasas';
    public $timestamps = false;

    protected $fillable = [
        'nama_jasa', 'harga_jasa', 'lama_jasa',
    ];

    public function pesananJasas()
    {
        return $this->hasMany(PesananJasa::class, 'id_jasa');
    }
}