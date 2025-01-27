<?php

namespace App\Http\Controllers;

use App\Models\Contagem;
use App\Models\Departamento;
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
            $mudanca = $patrimonio->audits()->with('user')->get()->filter(function ($audit) {
            return array_key_exists('departamento_id', $audit->new_values);
            })->map(function ($audit) {
            return [
                'departamento_novo' => Departamento::find($audit->new_values['departamento_id']),
                'data_modificacao' => $audit->created_at,
            ];
            });
            if ($mudanca->isNotEmpty()) {
                $historico[$patrimonio->codigo] = $mudanca;
            }
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
