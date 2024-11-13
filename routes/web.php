<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('dashboard');
});

Route::resource('usuarios', UsuarioController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function() {
    Route::view('home', 'home')->name('home');
    Route::view('contagens', 'contagem.index')->name('contagem.index');
    Route::view('relatorios', 'relatorio.index')->name('relatorio.index');
    Route::view('patrimonios', 'patrimonio.index')->name('patrimonio.index');
});

Route::resource('usuarios', UsuarioController::class)->middleware('auth');
