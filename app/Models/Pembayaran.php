<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class Pembayaran extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'siswa_id', // relasi ke siswa
        'nis',      // salinan dari data siswa
        'nama',     // salinan dari data siswa
        'bulan',
        'tanggal',
        'jumlah'
    ];

    // Relasi ke model Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
