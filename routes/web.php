<?php
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\MenuController;
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
Route::get('/menu',[MenuController::class, 'index'])->name('municipios.menu');
Route::get('/municipios',[MunicipioController::class, 'index'])->name('municipios.index');
Route::post('/municipios',[MunicipioController::class, 'store'])->name('municipios.store');
Route::get('/municipios/create',[MunicipioController::class, 'create'])->name('municipios.create');
Route::delete('/municipios/{municipio}',[MunicipioController::class, 'destroy'])->name('municipios.destroy');
Route::put('/municipios/{municipio}',[MunicipioController::class, 'update'])->name('municipios.update');
Route::get('/municipios/{municipio}/edit',[MunicipioController::class, 'edit'])->name('municipios.edit');


Route::get('/departamentos',[DepartamentoController::class, 'index'])->name('departamentos.index');
Route::post('/departamentos',[DepartamentoController::class, 'store'])->name('departamentos.store');
Route::get('/departamentos/create',[DepartamentoController::class, 'create'])->name('departamentos.create');
Route::delete('/departamentos/{departamento}',[DepartamentoController::class, 'destroy'])->name('departamentos.destroy');
