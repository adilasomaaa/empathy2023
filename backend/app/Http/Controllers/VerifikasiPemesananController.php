<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VerifikasiPemesanan;
use App\Http\Resources\VerifikasiPemesananResource;

class VerifikasiPemesananController extends Controller
{
    public function byPemesanan($pemesanan_id)
    {
        $pemesanan = VerifikasiPemesanan::where('pemesanan_id',$pemesanan_id)->first();
        return VerifikasiPemesananResource::make($pemesanan);
    }
}
