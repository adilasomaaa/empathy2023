<?php

use App\Http\Controllers\CommitteeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/committee')->group(function(){
        Route::get('', [CommitteeController::class, 'index'])->name('committee.index');

        Route::get('/byDepartmentid/{department}', [CommitteeController::class, 'committee_byDepartment'])->name('committee.committee_byDepartment');

        Route::post('/create', [CommitteeController::class, 'store'])->name('committee.store');
        Route::delete('/multi-delete', [CommitteeController::class, 'multiDestroy'])->name('committee.multiDestroy');
        Route::get('/{committee}', [CommitteeController::class, 'show'])->name('committee.show');
        Route::patch('/edit/{committee}', [CommitteeController::class, 'update'])->name('committee.update');
        Route::delete('/delete/{committee}', [CommitteeController::class, 'destroy'])->name('committee.delete');
        Route::get('/skPersonnel-preview/{committee}', [CommitteeController::class, 'skPersonel_pdf'])->name('committee.skPersonnel');
    });