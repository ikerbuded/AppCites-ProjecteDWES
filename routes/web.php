<?php

use App\Http\Controllers\BuscarParellaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MissatgeController;
use App\Http\Controllers\PrefereciaController;
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
    Route::get('/perfil/configuracio', [ProfileController::class, 'edit'])->name('profile.edit');
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
    Route::get('/missatges/crear/{receiverId}', [MissatgeController::class, 'create'])->name('missatges.create');
    Route::post('/missatges', [MissatgeController::class, 'store'])->name('missatges.store');
    Route::get('/missatges/{id}', [MissatgeController::class, 'show'])->name('missatges.show');


    Route::get('/cites', [CitaController::class, 'index'])->name('cites.index');
    Route::get('/cites/{id}', [CitaController::class, 'show'])->name('cites.show');
    Route::post('/cites/solicitar/{receiverId}', [CitaController::class, 'solicitar'])->name('cites.solicitar');
    Route::post('/cites/{id}/{resposta}', [CitaController::class, 'resposta'])->name('cites.resposta');


    Route::get('/buscarparella', [BuscarParellaController::class, 'index'])->name('buscarparella.index');
    Route::get('/buscarparella/{id}/like', [BuscarParellaController::class, 'likeUser'])->name('buscarparella.like');
    Route::get('/buscarparella/{id}/dislike', [BuscarParellaController::class, 'dislikeUser'])->name('buscarparella.dislike');
    Route::get('/buscarparella/unlike/{id}', [BuscarParellaController::class, 'unlike'])->name('buscarparella.unlike');
    Route::get('/buscarparella/undislike/{id}', [BuscarParellaController::class, 'undislike'])->name('buscarparella.undislike');


    Route::get('/perfil/{name}', [UsuariController::class, 'show'])->name('usuari.perfil');
    Route::get('/perfil/editar', [UsuariController::class, 'edit'])->name('usuari.editar');
    Route::post('/perfil/preferencies', PrefereciaController::class)->name('preferencies');
});

require __DIR__ . '/auth.php';
