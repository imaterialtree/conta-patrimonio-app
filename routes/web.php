<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('home');
});

Route::resource('usuarios', UsuarioController::class);

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::view('home', 'home')->name('home');
    Route::view('contagens', 'contagem.index')->name('contagem.index');
    Route::view('relatorios', 'relatorio.index')->name('relatorio.index');
    Route::view('patrimonios', 'patrimonio.index')->name('patrimonio.index');
});

Route::resource('usuarios', UsuarioController::class)->middleware('auth');
