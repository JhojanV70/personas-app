<?php
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
Route::get('/municipios/create',[MunicipioController::class, 'create'])->name('municipios.create');