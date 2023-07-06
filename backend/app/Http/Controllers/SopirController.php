<?php

namespace App\Http\Controllers;

use App\Http\Resources\SopirResource;
use App\Models\Sopir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SopirController extends Controller
{
    public function index()
    {
        $data = Sopir::get();
        return response()->json([
            'info' => 'seccess',
            'data' => SopirResource::collection($data)
        ], 200);
    }

    public function byUser($user_id)
    {
        $data = Sopir::where('user_id', $user_id)->first();
        return response()->json([
            'info' => 'seccess',
            'data' => SopirResource::make($data)
        ], 200);
    }

    public function show(Sopir $sopir)
    {
        return response()->json([
            'info' => 'seccess',
            'data' => SopirResource::make($sopir)
        ], 200);
    }

    public function store(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $op = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png',
            'rumah_sakit_id' => 'required',
        ]);
        $user = User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);
        $user->assignRole('pengemudi');
        $op['user_id'] = $user->id;
        if (request()->file('foto')) {
            $file = request()->file('foto');
            $name = $file->store("sopir");
            $op['foto'] = $name;
        }
        Sopir::create($op);
        return response()->json([
            'info' => 'created'
        ], 200);
    }

    public function update(Request $request, Sopir $sopir)
    {
        $user = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'rumah_sakit_id' => 'required',
        ]);
        if (request()->file('foto')) {
            $file = request()->file('foto');
            $name = $file->store("sopir");
            $data['foto'] = $name;
        }
        $sopir->update($data);
        $sopir->user->update($user);
        return response()->json([
            'info' => 'updated'
        ], 200);
    }

    public function delete(Sopir $sopir)
    {
        $sopir->update();
        return response()->json([
            'info' => 'deleted'
        ], 200);
    }
}
