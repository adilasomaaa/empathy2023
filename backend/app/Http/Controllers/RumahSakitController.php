<?php

namespace App\Http\Controllers;

use App\Http\Resources\Rumah_sakitResource;
use App\Models\Rumah_sakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        $data = Rumah_sakit::get();
        return response()->json([
            'info' => 'seccess',
            'data' => Rumah_sakitResource::collection($data)
        ], 200);
    }

    public function show(Rumah_sakit $rumah_sakit)
    {
        return response()->json([
            'info' => 'seccess',
            'data' => Rumah_sakitResource::make($rumah_sakit)
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png',
        ]);
        if (request()->file('foto')) {
            $file = request()->file('foto');
            $name = $file->store("rumah_sakit");
            $data['foto'] = $name;
        } else {
            $data['foto'] = request()->file('foto');
        }
        Rumah_sakit::create($data);
        return response()->json([
            'info' => 'created'
        ],200);
    }

    public function update(Request $request, Rumah_sakit $rumah_sakit)
    {
        $data = $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            // 'foto' => 'required|mimes:jpg,jpeg,png',
        ]);
        if (request()->file('foto')) {
            $file = request()->file('foto');
            $name = $file->store("rumah_sakit");
            $data['foto'] = $name;
        }
        $rumah_sakit->update($data);
        return response()->json([
            'info' => 'updated'
        ],200);
    }

    public function destroy(Rumah_sakit $rumah_sakit)
    {
        $rumah_sakit->delete();
        return response()->json([
            'info' => 'deleted'
        ],200);
    }
}
