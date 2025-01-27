<?php

namespace App\Http\Controllers;

use App\Models\Contagem;
use App\Models\Patrimonio;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index()
    {
        return view('relatorio.index');
    }

    public function contagem(Contagem $contagem)
    {
        $departamentos = $contagem->departamentos;
        $patrimoniosContados = $contagem->patrimoniosContados;
        $patrimonioTotal = Patrimonio::count();
        $sugestoes = $contagem->patrimoniosContados()->whereNotNull('classificacao_proposta_id')->get();

        $pdf = PDF::loadView('relatorio.contagem', compact('contagem', 'departamentos', 'patrimoniosContados', 'patrimonioTotal', 'sugestoes'));
        return $pdf->stream('relatorio_contagem.pdf');
    }

    public function historicoMovimentacao()
    {
        $patrimonios = Patrimonio::all();
        $historico = [];

        foreach ($patrimonios as $patrimonio) {
            $historico[$patrimonio->codigo] = $patrimonio->patrimoniosContados()->with('departamento')->get();
        }

        $pdf = PDF::loadView('relatorio.historico_movimentacao', compact('historico'));
        return $pdf->stream('relatorio_historico_movimentacao.pdf');
    }

    public function selectContagem()
    {
        $contagens = Contagem::all();
        return view('relatorio.select-contagem', compact('contagens'));
    }


    public function patrimonioHistorico(Patrimonio $patrimonio)
    {
        $audits = $patrimonio->audits;

        return view('relatorio.patrimonio.historico', compact('patrimonio', 'audits'));
    }
}
