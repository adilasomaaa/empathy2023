<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RumahSakitController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     // return $request->user()->with('permissions');
//     // return User::with(['roles','permissions'])->find($request->user()->id);
// });

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/auth', [AuthController::class, 'getUser']);
    // Route::get('/auth-ability', [AuthController::class, 'getAbility']);
    Route::get('/auth-role', [AuthController::class, 'getRole']);
    // Route::get('/permissions', [AuthController::class, 'getAllPermissions']);
});

Route::apiResource('rumah_sakit',RumahSakitController::class);
