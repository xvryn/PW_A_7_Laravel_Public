<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'penggunas';
    public $timestamps = false;

    protected $fillable = [
        'nama', 'alamat', 'telepon', 'username', 'password',
    ];

    public function pesananJasas()
    {
        return $this->hasMany(PesananJasa::class);
    }

    public function pembelianBarangs()
    {
        return $this->hasMany(PembelianBarang::class);
    }
}