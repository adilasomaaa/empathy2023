<?php

namespace App\Http\Controllers;

use App\Http\Resources\MobilResource;
use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        $data = Mobil::get();
        return response()->json([
            'info' => 'seccess',
            'data' => MobilResource::collection($data)
        ], 200);
    }

    public function byRumah_sakit($rumah_sakit_id)
    {
        $data = Mobil::where('rumah_sakit_id', $rumah_sakit_id)->get();
        return response()->json([
            'info' => 'seccess',
            'data' => MobilResource::collection($data)
        ], 200);
    }

    public function show(Mobil $mobil)
    {
        return response()->json([
            'info' => 'seccess',
            'data' => MobilResource::make($mobil)
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'no_plat' => 'required',
            'rumah_sakit_id' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png',
        ]);
        if (request()->file('foto')) {
            $file = request()->file('foto');
            $name = $file->store("mobil");
            $data['foto'] = $name;
        } else {
            $data['foto'] = request()->file('foto');
        }
        Mobil::create($data);
        return response()->json([
            'info' => 'created'
        ], 200);
    }

    public function update(Request $request, Mobil $mobil)
    {
        $data = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'no_plat' => 'required',
            'rumah_sakit_id' => 'required',
            // 'foto' => 'required|mimes:jpg,jpeg,png',
        ]);
        if (request()->file('foto')) {
            $file = request()->file('foto');
            $name = $file->store("mobil");
            $data['foto'] = $name;
        }
        $mobil->update($data);
        return response()->json([
            'info' => 'updated'
        ], 200);
    }

    public function delete(Mobil $mobil)
    {
        $mobil->update();
        return response()->json([
            'info' => 'deleted'
        ], 200);
    }
}
