<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Level extends Model
{
    protected $primaryKey = 'id_level';
    protected $fillable = [
        'nama_level'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
