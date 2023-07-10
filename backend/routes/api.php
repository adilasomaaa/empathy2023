<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\VerifikasiPemesananController;
use App\Http\Controllers\SopirController;
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

Route::get('coba', [PemesananController::class, 'coba']);
// rumah_sakit
Route::apiResource('rumah_sakit',RumahSakitController::class);

// user
Route::apiResource('user',UserController::class);
// operator
Route::apiResource('operator',OperatorController::class);
Route::prefix('operator')->group(function(){
    Route::get('{user}/byUser', [OperatorController::class, 'byUser']);
});
// mobil
Route::apiResource('mobil',MobilController::class);
Route::prefix('mobil')->group(function(){
    Route::get('{rumah_sakit_id}/byRumah_sakit', [MobilController::class, 'byRumah_sakit']);
});

// pemesanan
Route::apiResource('pemesanan',PemesananController::class);
Route::prefix('pemesanan')->group(function(){
    Route::put('{pemesanan}/konfirmasi', [PemesananController::class, 'konfirmasi']);
    Route::get('{sopir_id}/bySopir', [PemesananController::class, 'bySopir']);
    Route::get('{rumah_sakit_id}/byRumah_sakit', [PemesananController::class, 'byRummah_sakit']);
    Route::put('{pemesanan}/setStatus', [PemesananController::class, 'setStatus']);
    Route::put('{status}/byStatus', [PemesananController::class, 'byStatus']);
    Route::put('{nama}/byNama', [PemesananController::class, 'byNama']);
});

Route::get('verifikasi/{pemesanan_id}/byPemesanan', [VerifikasiPemesananController::class ,'byPemesanan']);

// sopir
Route::apiResource('sopir',SopirController::class);
Route::prefix('sopir')->group(function(){
    Route::get('{user_id}/byUser', [SopirController::class, 'byUser']);
    Route::get('{rumah_sakit_id}/byRumah_sakit', [SopirController::class, 'byRumah_sakit']);
});
