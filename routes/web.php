<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComunaController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/comunas', [ComunaController::class, 'index'])->name('comunas.index');
    Route::post('/comunas', [ComunaController::class, 'store'])->name('comunas.store');
    Route::get('/comunas/create', [ComunaController::class, 'create'])->name('comunas.create');
    Route::delete('/comunas/{comuna}', [ComunaController::class, 'destroy'])->name('comunas.destroy');
    Route::put('/comunas/{comuna}', [ComunaController::class, 'update'])->name('comunas.update');
    Route::get('/comunas/{comuna}/edit', [ComunaController::class, 'edit'])->name('comunas.edit');
    
});


    

require __DIR__.'/auth.php';
