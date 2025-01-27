<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComissaoContagemController;
use App\Http\Controllers\ContagemController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatrimonioContadoController;
use App\Http\Controllers\PatrimonioController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\UsuarioController;
use App\Models\Departamento;
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
    // relatorios
    Route::get('relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');
    Route::get('relatorios/contagem', [RelatorioController::class, 'selectContagem'])->name('relatorios.contagem');
    Route::get('relatorios/contagem/{contagem}', [RelatorioController::class, 'contagem'])->name('relatorios.contagem.pdf');
    Route::get('relatorios/historico-movimentacao', [RelatorioController::class, 'historicoMovimentacao'])->name('relatorios.historico_movimentacao');
    Route::get('relatorios/historico-movimentacao', [RelatorioController::class, 'historicoMovimentacaoForm'])->name('relatorios.historico_movimentacao.form');
    Route::get('relatorios/historico-movimentacao/view', [RelatorioController::class, 'historicoMovimentacaoView'])->name('relatorios.historico_movimentacao.view');
    Route::get('relatorios/historico-movimentacao/pdf', [RelatorioController::class, 'historicoMovimentacaoPdf'])->name('relatorios.historico_movimentacao.pdf');
    Route::get('relatorios/patrimonio', [RelatorioController::class, 'patrimonioHistoricoForm'])->name('relatorios.patrimonio.form');
    Route::get('relatorios/patrimonio//historico', [RelatorioController::class, 'patrimonioHistoricoView'])->name('relatorios.patrimonio.historico.view');
    Route::get('relatorios/patrimonio//historico/pdf', [RelatorioController::class, 'patrimonioHistoricoPdf'])->name('relatorios.patrimonio.historico.pdf');
});

Route::prefix('comissao')->name('comissao.')
    ->middleware('auth')
    ->group(function () {
        Route::get('home', [ComissaoContagemController::class, 'index'])->name('home');
        Route::get('perfil', [UsuarioController::class, 'perfil'])->name('perfil');
        Route::view('config', 'comissao.config')->name('config');
        Route::get('patrimonios', [ComissaoContagemController::class, 'patrimonios'])->name('patrimonios');
        Route::get('patrimonios/show', [ComissaoContagemController::class, 'showPatrimonio'])->name('comissao.patrimonios.show');

        Route::prefix('contagem/{contagem}')->name('contagem.')->group(function () {
            Route::get('departamentos', [ComissaoContagemController::class, 'departamentos'])->name('departamentos');
            Route::get('departamentos/{departamento}/patrimonios', [PatrimonioContadoController::class, 'index'])->name('patrimonios.index');
            Route::get('departamentos/{departamento}/patrimonios/{patrimonio}', [PatrimonioContadoController::class, 'show'])->name('patrimonios.show');
            Route::put('departamentos/{departamento}/patrimonios/{patrimonio}', [PatrimonioContadoController::class, 'update'])->name('patrimonios.update');
            Route::post('departamentos/{departamento}/patrimonios/{patrimonio?}', [PatrimonioContadoController::class, 'store'])->name('patrimonios.store');
        });
    });
