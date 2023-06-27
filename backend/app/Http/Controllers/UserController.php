<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        return UserResource::collection($user);
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'email' => 'required|email', 
            'password' => 'required',
            'role' => 'required'
		]);
        $user = User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);
        // $data_user['password']= bcrypt($request->password);
        // $user = User::create($data_user);
        $user->assignRole($request->role);
		if($user) {
            return response()->json([
                'info' => 'created'
            ], 200);
        }
    }

    
    public function show(User $user)
    {
        return UserResource::make($user);
    }
    
    public function update(Request $request, User $user)
    {
        $user->update([
            'username' => request('username'),
            'email' => request('email'),
        ]);
        if($request->password) {
            $user->update([
                'password' => Hash::make(request('password')),
            ]);
        }
        if ($user) {
            return response()->json([
                'info' => 'updated',
            ],200);
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'info' => 'Berhasil dihapus',
        ]);
    }

    public function multiDestroy()
    {
            $id = request('q');
            $ids = explode(",", $id);
            $user = User::whereIn('id', $ids)->delete();
            return response()->json([
                'info'=> "Berhasil menghapus data yang dipilih",
            ], 200);  
    }

    
}
