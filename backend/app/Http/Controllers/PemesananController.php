<?php

namespace App\Http\Controllers;

use App\Http\Resources\PemesananResource;
use App\Models\Pemesanan;
use App\Models\Rumah_sakit;
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

    private function getLokasi($lat, $lng)
    {
        // return 'coba';
        // $lat = 0.5768439; // Latitude titik awal
        // $lng = 123.0597954; // Longitude titik awal

        $nearestLocation = Rumah_sakit::selectRaw("*,
    (6371 * acos(cos(radians($lat)) * cos(radians(lat)) * cos(radians(lng) - radians($lng)) +
    sin(radians($lat)) * sin(radians(lat)))) AS distance")
        ->orderBy('distance')
        ->first();

        // Mengakses atribut lokasi terdekat
        $lokasi_id = $nearestLocation->id;
        $nearestLatitude = $nearestLocation->lat;
        $nearestLongitude = $nearestLocation->lng;
        return [
            'id' => $lokasi_id,
            'lat' => $nearestLatitude,
            'lng' => $nearestLongitude,
        ];
    }

    public function coba()
    {
        return $this->getLokasi(0.5768439, 123.0597954)['id'];
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
            // 'nama' => 'required',
            'lokasi' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'nohp' => 'required',
            // 'rumah_sakit_id' => 'required',
            // 'deskrpsi' => 'required',
            // 'foto' => 'required|mimes:jpg,jpeg,png',
        ]);
        $data['nama']= mt_rand(100000, 999999);
        $data['rumah_sakit_id'] = $this->getLokasi($request->lat, $request->lng)['id']; 
        // if (request()->file('foto')) {
        //     $file = request()->file('foto');
        //     $name = $file->store("pemesanan");
        //     $data['foto'] = $name;
        // } else {
        //     $data['foto'] = request()->file('foto');
        // }
        // $data['deskripsi'] = $request->deskripsi;
        $blobData = $request->file('deskrpsi');
        // $filename = $blobData->getClientMimeType();
        $storagePath = public_path()."/assets/";
        // $url = $req->audioUrl;
        // $audio= $blobData;
        
        // $data = base64_decode($audio);
        // $file = uniqid() . '.webm';
        // $success = file_put_contents($file, $data);
        
        $filename = uniqid() . '.webm';
        $data['deskrpsi'] = $filename;
        // $blobData = mb_convert_encoding($blobData, 'UTF-8', 'auto');
        // $binaryData = file_get_contents($blobData);
        
        // file_put_contents($storagePath . '/' . $file, $blobData);
        $blobData->storeAs('audio',$filename);

        Pemesanan::create($data);
        return response()->json([
            'info' => 'created',
            'data' => $blobData
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

    public function setStatus(Request $request, Pemesanan $pemesanan)
    {
        $data = $request->validate([
            'status' => 'required',
        ]);
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
