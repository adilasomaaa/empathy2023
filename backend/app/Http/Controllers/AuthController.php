<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{
    public function getUser(Request $request)
    {
        return $request->user();
    }

    public function getAbility(Request $request)
    {
        return $request->user()->getAllPermissions()->pluck('name');
    }

    public function getRole(Request $request)
    {
        return $request->user()->getRoleNames();
    }

    public function getAllPermissions()
    {
        $getPermissions = Permission::whereNot('id', 1);
        $permissions = [];
        foreach($getPermissions->get() as $permission){
            $new_array = ['id' => $permission['id'], 'name' => $permission['name']];
            array_push($permissions, $new_array);
        }
        return response()->json($permissions);
    }
}
