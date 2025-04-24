<?php

use App\Http\Controllers\FotoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Mostrar vista de gestió de fotos
    Route::get('/usuari/fotos', [FotoController::class, 'show'])->name('user.modificarfotos');

    // Pujar una nova foto (una en una)
    Route::post('/usuari/foto', [FotoController::class, 'store'])->name('user.guardarfoto');

    // Eliminar una foto
    Route::delete('/usuari/foto/{id}', [FotoController::class, 'destroy'])->name('user.eliminarfoto');

    // Assignar una foto com a principal (avatar)
    Route::post('/usuari/foto/{id}/principal', [FotoController::class, 'assignarAvatar'])->name('user.assignaravatar');
});

require __DIR__ . '/auth.php';
