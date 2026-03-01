<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LombaBasket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tim', 'pelatih', 'jumlah_pemain', 'skor', 'tanggal_pertandingan', 'asal_sekolah'
    ];
}