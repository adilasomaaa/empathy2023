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
        $User = User::get();
        return UserResource::collection($User);
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'email' => 'required|email', 
            'password' => 'required'
		]);
        $user = User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);
        // $data_user['password']= bcrypt($request->password);
        // $user = User::create($data_user);
        $user->assignRole('admin');
		if($user) {
            return response()->json([
                'data' => $user,
                // 'data' => DepartmentResource::make($department),
                'message' => 'Berhasil menambah data'
            ], 200);
        }
    }

    
    public function show(User $User)
    {
        return UserResource::make($User);
    }
    
    public function update(Request $request, User $User)
    {
        $User->update([
            'username' => request('username'),
            'email' => request('email'),
        ]);
        if($request->password) {
            $User->update([
                'password' => Hash::make(request('password')),
            ]);
        }
        if ($User) {
            return response()->json([
                'message' => 'Berhasil perbaharui',
                'data' => $User
            ],200);
        }
    }

    public function updateFoto(Request $request, User $user)
    {
        $request->validate([
            'foto' => 'required'
        ]);
        if($request->foto) {
            $getphoto = $request->foto;
            $imageName = rand() . '.' .$getphoto->getClientOriginalExtension();
            $getphoto->move(public_path('foto/user'), $imageName);
            User::findOrFail($user->id)->update([
                'foto' => $imageName,
            ]);
        };
        return response()->json([
            'message' => 'Foto user berhasil diperbaharui'
        ]);
    }

    public function destroy(User $User)
    {
        $data = User::find($User->user_id)->delete();
        // $data = $student->delete();
        return response()->json([
            'message' => 'Berhasil dihapus',
            'data' => $data
        ]);
    }

    public function multiDestroy()
    {
            $id = request('q');
            $ids = explode(",", $id);
            $User = User::whereIn('id', $ids)->delete();
            return response()->json([
                'message'=> "Berhasil menghapus data yang dipilih",
                'User' => $User,
            ], 200);  
    }

    
}
