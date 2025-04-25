<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MissatgeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuariController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::get('/dashboard', HomeController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Mostrar vista de gestió de fotos
    Route::get('/fotos', [FotoController::class, 'show'])->name('user.modificarfotos');

    // Pujar una nova foto (una en una)
    Route::post('/foto', [FotoController::class, 'store'])->name('user.guardarfoto');

    // Eliminar una foto
    Route::delete('/foto/{id}', [FotoController::class, 'destroy'])->name('user.eliminarfoto');

    // Assignar una foto com a principal (avatar)
    Route::post('/foto/{id}/principal', [FotoController::class, 'assignarAvatar'])->name('user.assignaravatar');


    Route::get('/missatges', [MissatgeController::class, 'index'])->name('missatges.index');
    Route::get('/cites', [CitaController::class, 'index'])->name('cites.index');
    Route::get('/buscarparella', [UsuariController::class, 'index'])->name('buscarparella.index');
});

require __DIR__ . '/auth.php';
