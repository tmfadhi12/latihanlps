<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;
use App\Models\Tagihan;

class Penggunaan extends Model
{
    protected $table = 'penggunaan';
    protected $primaryKey = 'id_penggunaan';
    protected $fillable = [
        'id_pelanggan',
        'bulan',
        'tahun',
        'meter_awal',
        'meter_akhir'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function tagihan()
    {
        return $this->hasOne(Tagihan::class);
    }
}
