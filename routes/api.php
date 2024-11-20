<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ComunaController;
use App\Http\Controllers\api\MunicipioController;
use App\Http\Controllers\api\DepartamentoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/comunas', [ComunaController::class, 'index'])->name('comunas');
Route::post('/comunas', [ComunaController::class, 'store'])->name('comunas.store');
Route::delete('/comunas/{comuna}', [ComunaController::class, 'destroy'])->name('comunas.destroy');
Route::get('/comunas/{comuna}', [ComunaController::class, 'show'])->name('comunas.show');
Route::put('/comunas/{comuna}', [ComunaController::class, 'update'])->name('comunas.update');


Route::get('/municipios', [MunicipioController::class, 'index'])->name('municipios');
Route::post('/municipios', [MunicipioController::class, 'store'])->name('municipios.store');
Route::delete('/municipios/{municipio}', [MunicipioController::class, 'destroy'])->name('municipios.destroy');
Route::get('/municipios/{municipio}', [MunicipioController::class, 'show'])->name('municipios.show');
Route::put('/municipios/{municipio}', [MunicipioController::class, 'update'])->name('municipios.update');

Route::apiResource('departamentos', DepartamentoController::class);