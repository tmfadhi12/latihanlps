<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarif;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use App\Models\Penggunaan;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $fillable = [
        'username',
        'password',
        'nomor_kwh',
        'nama_pelanggan',
        'alamat',
        'id_tarif'
    ];
    
    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }

    public function tagihan()
    {
        return $this->hasOne(Tagihan::class);
    }

    public function Pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    public function Penggunaan()
    {
        return $this->hasOne(Penggunaan::class);
    }
}