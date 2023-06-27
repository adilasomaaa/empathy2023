<?php

namespace App\Http\Controllers;

use App\Http\Resources\PemesananResource;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $data = Pemesanan::get();
        return response()->json([
            'info' => 'seccess',
            'data' => PemesananResource::collection($data)
        ], 200);
    }

    public function byRumah_sakit($rumah_sakit_id)
    {
        $data = Pemesanan::where('rumah_sakit_id', $rumah_sakit_id)->get();
        return response()->json([
            'info' => 'seccess',
            'data' => PemesananResource::collection($data)
        ], 200);
    }

    public function show(Pemesanan $pemesanan)
    {
        return response()->json([
            'info' => 'seccess',
            'data' => PemesananResource::make($pemesanan)
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'nohp' => 'required',
            'rumah_sakit_id' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png',
        ]);
        if (request()->file('foto')) {
            $file = request()->file('foto');
            $name = $file->store("pemesanan");
            $data['foto'] = $name;
        } else {
            $data['foto'] = request()->file('foto');
        }
        $data['deskripsi'] = $request->deskripsi;
        Pemesanan::create($data);
        return response()->json([
            'info' => 'created'
        ], 200);
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        $data = $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'nohp' => 'required',
            'rumah_sakit_id' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png',
            // 'foto' => 'required|mimes:jpg,jpeg,png',
        ]);
        if (request()->file('foto')) {
            $file = request()->file('foto');
            $name = $file->store("pemesanan");
            $data['foto'] = $name;
        }
        $data['deskripsi'] = $request->deskripsi;
        $pemesanan->update($data);
        return response()->json([
            'info' => 'updated'
        ], 200);
    }

    public function delete(Pemesanan $pemesanan)
    {
        $pemesanan->update();
        return response()->json([
            'info' => 'deleted'
        ], 200);
    }
}