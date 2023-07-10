<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $guarded = ['id'];

    public function verifikasi_pemesanan()
    {
        return $this->hasOne(VerifikasiPemesanan::class,'pemesanan_id');
    }

    public function rumah_sakit()
    {
        return $this->belongsTo(Rumah_sakit::class,'rumah_sakit_id');
    }
}
