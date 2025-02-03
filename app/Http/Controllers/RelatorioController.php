<?php

namespace App\Http\Controllers;

use App\Models\Contagem;
use App\Models\Departamento;
use App\Models\Patrimonio;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Helpers\DepartamentoHelper;

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
        $patrimoniosNaoEncontrados = $contagem->patrimoniosContados()->naoEncontrados()->get();
        $patrimoniosDiferenteLocal = $contagem->patrimoniosContados()->diferenteLocal()->get();

        $pdf = PDF::loadView('relatorio.contagem', compact('contagem', 'departamentos', 'patrimoniosContados', 'patrimonioTotal', 'sugestoes', 'patrimoniosNaoEncontrados', 'patrimoniosDiferenteLocal'));
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
                'data_modificacao' => $audit->created_at->format('d/m/Y H:i'),
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

    public function historicoMovimentacaoForm()
    {
        $departamentos = Departamento::all();
        return view('relatorio.historico_movimentacao_form', compact('departamentos'));
    }

    public function historicoMovimentacaoView(Request $request)
    {
        $query = Patrimonio::query();

        if ($request->filled('data_inicio')) {
            $query->whereHas('audits', function ($q) use ($request) {
                $q->where('created_at', '>=', $request->data_inicio);
            });
        }

        if ($request->filled('data_fim')) {
            $query->whereHas('audits', function ($q) use ($request) {
                $q->where('created_at', '<=', $request->data_fim);
            });
        }

        if ($request->filled('departamento_id')) {
            $query->whereHas('audits', function ($q) use ($request) {
                $q->where('new_values->departamento_id', $request->departamento_id);
            });
        }

        if ($request->filled('movimentado')) {
            $query->whereHas('audits', function($q) use ($request) {
                $request->dataInicio ? $q->where('created_at', '>=', $request->dataInicio) : null;
                $request->dataInicio ? $q->where('new_values->departamento_id', $request->departamento_id) : null;
            }, '>', 1);
        }

        // Carregar os patrimônios com os audits filtrados
        $patrimonios = $query->with(['audits' => function ($q) use ($request) {
            if ($request->filled('data_inicio')) {
                $q->where('created_at', '>=', $request->data_inicio);
            }
            if ($request->filled('departamento_id')) {
                $q->where('new_values->departamento_id', $request->departamento_id);
            }
        }])->get();

        // Adicionar o título do departamento aos audits
        foreach ($patrimonios as $patrimonio) {
            foreach ($patrimonio->audits as $audit) {
                $audit->departamento_titulo = DepartamentoHelper::getDepartamentoTitulo($audit->new_values['departamento_id']);
            }
        }

        return view('relatorio.historico_movimentacao_view', compact('patrimonios'));
    }

    public function historicoMovimentacaoPdf(Request $request)
    {
        $patrimonios = $this->historicoMovimentacaoView($request)->patrimonios;
        $pdf = PDF::loadView('relatorio.historico_movimentacao_pdf', compact('patrimonios'));
        return $pdf->stream('relatorio_historico_movimentacao.pdf');
    }

    public function patrimonioHistoricoView()
    {
        $patrimonio = Patrimonio::findOrFail(request('patrimonio_id'));
        $audits = $patrimonio->audits;
        // dd($patrimonio->toArray(), $audits->toArray());
        return view('relatorio.patrimonio_historico_view', compact('patrimonio', 'audits'));
    }

    public function patrimonioHistoricoPdf()
    {
        $patrimonio = Patrimonio::findOrFail(request('patrimonio_id'));
        $audits = $patrimonio->audits;
        $pdf = PDF::loadView('relatorio.patrimonio_historico_pdf', compact('patrimonio', 'audits'));
        return $pdf->stream('relatorio_patrimonio_historico.pdf');
    }

    public function patrimonioHistoricoForm()
    {
        $patrimonios = Patrimonio::all();
        return view('relatorio.patrimonio_historico_form', compact('patrimonios'));
    }
}
