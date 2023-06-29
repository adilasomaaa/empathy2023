<?php

namespace App\Http\Controllers;

use App\Http\Resources\OperatorResource;
use App\Models\Operator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OperatorController extends Controller
{
    public function index()
    {
        $user = Operator::get();
        return OperatorResource::collection($user);
    }

    public function byUser($user)
    {
        $data = Operator::where('user_id', $user)->first();
        return response()->json([
            'info' => 'seccess',
            'data' => OperatorResource::make($data)
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
            'jk' => 'required',
            'nohp' => 'required',
            'rumah_sakit_id' => 'required',
        ]);
        $user = User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);
        $user->assignRole('operator');
        $op['user_id'] = $user->id;
        Operator::create($op);
        return response()->json([
            'info' => 'created'
        ], 200);
    }


    public function show(Operator $user)
    {
        return OperatorResource::make($user);
    }

    public function update(Request $request, Operator $operator)
    {
        $op = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'nohp' => 'required',
            'rumah_sakit_id' => 'required',
        ]);
        $operator->user->update([
            'username' => request('username'),
            'email' => request('email'),
        ]);
        if ($request->password) {
            $operator->user->update([
                'password' => Hash::make(request('password')),
            ]);
        };
        $operator->update($op);
        return response()->json([
            'info' => 'updated',
        ], 200);
    }

    public function destroy(Operator $operator)
    {
        $operator->user->delete();
        return response()->json([
            'info' => 'deleted',
        ], 200);
    }
}
