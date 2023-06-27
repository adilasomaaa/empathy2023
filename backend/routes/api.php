<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\UserController;
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

Route::apiResource('user',UserController::class);
// Route::prefix('users')->group(function(){
//     Route::get('{rumah_sakit_id}/byRumah_sakit', [UserController::class, 'byRumah_sakit']);
// });

Route::apiResource('mobil',MobilController::class);
Route::prefix('mobil')->group(function(){
    Route::get('{rumah_sakit_id}/byRumah_sakit', [MobilController::class, 'byRumah_sakit']);
});

Route::apiResource('pemesanan',PemesananController::class);
Route::prefix('pemesanan')->group(function(){
    Route::get('{rumah_sakit_id}/byRumah_sakit', [PemesananController::class, 'byRumah_sakit']);
});
