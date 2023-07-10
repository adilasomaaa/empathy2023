<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiPemesanan extends Model
{
    use HasFactory;
    protected $table = 'verifikasi_pemesanan';
    protected $guarded = ['id'];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }
    public function sopir()
    {
        return $this->belongsTo(Sopir::class, 'sopir_id');
    }
}
