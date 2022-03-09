<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;

class Tarif extends Model
{
    protected $table = 'tarif';
    protected $primaryKey = 'id_tarif';
    protected $fillable = [
        'daya',
        'tarifperkwh'
    ];

    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class);
    }
}
