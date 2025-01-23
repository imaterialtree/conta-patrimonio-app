<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComissaoContagemController;
use App\Http\Controllers\ContagemController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatrimonioContadoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $isAdmin = auth()->user()->isAdmin();

    return to_route($isAdmin ? 'home' : 'comissao.home');
})->middleware('auth');

Route::resource('usuarios', UsuarioController::class);

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('home', HomeController::class)->name('home');
    Route::resource('patrimonios', PatrimonioController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('contagens', ContagemController::class)
        ->parameters(['contagens' => 'contagem']);
    Route::put('contagens/{contagem}/finalizar', [ContagemController::class, 'finalizar'])->name('contagens.finalizar');
    Route::put('contagens/{contagem}/cancelar', [ContagemController::class, 'cancelar'])->name('contagens.cancelar');
    Route::get('/contagem/{contagem}/sugestoes', [ContagemController::class, 'sugestoes'])->name('contagem.sugestoes');
    Route::resource('departamentos', DepartamentoController::class);
});

Route::prefix('comissao')->name('comissao.')
    ->middleware('auth')
    ->group(function () {
        Route::get('home', [ComissaoContagemController::class, 'index'])->name('home');
        Route::get('perfil', [UsuarioController::class, 'perfil'])->name('perfil');
        Route::view('config', 'comissao.config')->name('config');

        Route::prefix('contagem/{contagem}')->name('contagem.')->group(function () {
            Route::get('departamentos', [ComissaoContagemController::class, 'departamentos'])->name('departamentos');
            Route::get('departamentos/{departamento}/patrimonios', [PatrimonioContadoController::class, 'index'])->name('patrimonios.index');
            Route::get('departamentos/{departamento}/patrimonios/{patrimonio}', [PatrimonioContadoController::class, 'show'])->name('patrimonios.show');
            Route::put('departamentos/{departamento}/patrimonios/{patrimonio}', [PatrimonioContadoController::class, 'update'])->name('patrimonios.update');
            Route::post('departamentos/{departamento}/patrimonios/{patrimonio?}', [PatrimonioContadoController::class, 'store'])->name('patrimonios.store');
        });
    });
