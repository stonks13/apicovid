<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ia14Controller;
use App\Http\Controllers\Ia7Controller;
use App\Http\Controllers\CasosController;
use App\Http\Controllers\MuertosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('ia14', Ia14Controller::class);
Route::post('ia14/{fecha}', [Ia14Controller::class,'show']);
Route::get('/ia14all', [Ia14Controller::class,'showAll']);
Route::post('/ia14add', [Ia14Controller::class,'store']);
Route::get('/ia14/{fecha}/{fecha2}', [Ia14Controller::class,'showPart']);
//Route::patch('/ia14update', [Ia14Controller::class, 'update']);


Route::resource('ia7', Ia7Controller::class);
Route::post('ia7/{fecha}', [Ia7Controller::class,'show']);
Route::get('/ia7all', [Ia7Controller::class,'showAll']);
Route::post('/ia7add', [Ia7Controller::class,'store']);
Route::get('/ia7/{fecha}/{fecha2}', [Ia7Controller::class,'showPart']);
//Route::patch('/ia7update', [Ia7Controller::class, 'update']);


Route::resource('casos', CasosController::class);
Route::post('casos/{fecha}', [CasosController::class,'show']);
Route::get('/casosall', [CasosController::class,'showAll']);
Route::post('/casosadd', [CasosController::class,'store']);
Route::get('/casos/{fecha}/{fecha2}', [CasosController::class,'showPart']);
//Route::patch('/casosupdate', [CasosController::class, 'update']);


Route::resource('muertos', MuertosController::class);
Route::post('muertos/{fecha}', [MuertosController::class,'show']);
Route::get('/muertosall', [MuertosController::class,'showAll']);
Route::post('/muertosadd', [MuertosController::class,'store']);
Route::get('/muertos/{fecha}/{fecha2}', [MuertosController::class,'showPart']);
//Route::patch('/muertosupdate', [MuertosController::class, 'update']);