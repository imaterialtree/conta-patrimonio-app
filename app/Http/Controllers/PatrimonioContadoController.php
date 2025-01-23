<?php

namespace App\Http\Controllers;

use App\Enums\ClassificacaoEnum;
use App\Models\Contagem;
use App\Models\Departamento;
use App\Models\Patrimonio;
use App\Models\PatrimonioContado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatrimonioContadoController extends Controller
{
    /**
     * Mostra na verdade todos os patrimônios do departamento
     */
    public function index(Contagem $contagem, Departamento $departamento)
    {
        $patrimoniosContados = $contagem->patrimoniosContados()->where('departamento_id', $departamento->id)->get();
        $patrimoniosForaDeLugar = $patrimoniosContados?->whereNotIn('patrimonio_id', $departamento->patrimonios->pluck('id'));

        $patrimonios = $departamento->patrimonios->map(function ($patrimonio) use ($patrimoniosContados) {
            return [
                'patrimonio' => $patrimonio,
                'patrimonioContado' => $patrimoniosContados?->firstWhere('patrimonio_id', $patrimonio->id),
            ];
        });

        return view('comissao.contagem.patrimonios.index', compact('contagem', 'departamento', 'patrimonios'));
    }

    public function show(Contagem $contagem, Departamento $departamento, Patrimonio $patrimonio)
    {
        $patrimonioContado = $contagem->patrimoniosContados()->whereBelongsTo($patrimonio)->first();
        $oldClassificacaoProposta = $patrimonioContado?->classificacao_proposta_id
            ? ClassificacaoEnum::fromId($patrimonioContado->classificacao_proposta_id)
            : null;
        
        return view('comissao.contagem.patrimonios.show', compact('contagem', 'departamento', 'patrimonio', 'oldClassificacaoProposta'));
    }

    public function create(Departamento $departamento)
    {
        return view('comissao.contagem.patrimonios.create', compact('departamento'));
    }

    public function store(Request $request, Contagem $contagem, Departamento $departamento, string $patrimonio = '')
    {
        if (empty($patrimonio)) {
            $request->validate([
                'codigo' => 'required|exists:patrimonios,codigo',
            ]);
            $patrimonio = Patrimonio::where('codigo', $request->codigo)->first();
        } else {
            $patrimonio = Patrimonio::find($patrimonio);
        }

        $request->validate([
            'nao_encontrado' => 'nullable|boolean',
            'classificacao_proposta_id' => 'nullable|exists:classificacoes,id',
        ]);

        if ($contagem->patrimoniosContados()->whereBelongsTo($patrimonio)->exists()) {
            return back()->withErrors(['codigo' => 'Patrimônio já foi lido!'])->withInput();
        }

        $patrimonio = PatrimonioContado::create([
            'contagem_id' => $contagem->id,
            'departamento_id' => $departamento->id,
            'patrimonio_id' => $patrimonio->id,
            'usuario_id' => auth()->user()->id,
        ]);

        return redirect()->route('comissao.contagem.patrimonios.index', [$contagem, $departamento])
            ->with('success', 'Patrimônio foi lido com sucesso!');
    }

    public function edit(Departamento $departamento, Patrimonio $patrimonio, PatrimonioContado $patrimonioContado)
    {
        return view('comissao.contagem.patrimonios.edit', compact('departamento', 'patrimonio', 'patrimonioContado'));
    }

    public function update(Request $request, Contagem $contagem, Departamento $departamento, Patrimonio $patrimonio)
    {
        $validated = $request->validate([
            'classificacao_proposta_id' => ['nullable', 'exists:classificacoes,id'],
            'foto' => 'nullable|image',
            'nao_encontrado' => 'nullable|boolean',
        ]);

        if (!$request->hasAny(['classificacao_proposta_id', 'foto', 'nao_encontrado'])) {
            return back()->withErrors(['classificacao_proposta' => 'Nenhuma alteração foi feita!'])->withInput();
        }

        // criar se não existe
        $patrimonioContado = $contagem->patrimoniosContados()->whereBelongsTo($patrimonio)->first();
        if (empty($patrimonioContado)) {
            $patrimonioContado = PatrimonioContado::create([
                'contagem_id' => $contagem->id,
                'departamento_id' => $departamento->id,
                'patrimonio_id' => $patrimonio->id,
                'usuario_id' => auth()->user()->id,
            ]);
        }

        if ($request->nao_encontrado) {
            $patrimonioContado->nao_encontrado = true;
            $patrimonioContado->save();

            return redirect()->route('comissao.contagem.patrimonios.index', [$contagem, $departamento])
                ->with('success', 'Patrimônio foi marcado como não encontrado!');
        }

        $patrimonioContado->update($validated);

        return redirect()->route('comissao.contagem.patrimonios.index', [$contagem, $departamento])
            ->with('success', 'Proposta de classificação salva!');
    }

    public function destroy(Departamento $departamento, PatrimonioContado $patrimonioContado)
    {
        $patrimonioContado->delete();

        return redirect()->route('comissao.contagem.patrimonios.index', $departamento)
            ->with('success', 'Patrimônio foi retornado para não contado!');
    }
}
