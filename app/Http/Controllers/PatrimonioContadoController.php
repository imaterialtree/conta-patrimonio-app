<?php

namespace App\Http\Controllers;

use App\Models\Contagem;
use App\Models\Departamento;
use App\Models\Patrimonio;
use App\Models\PatrimonioContado;
use Illuminate\Http\Request;

class PatrimonioContadoController extends Controller
{
    /**
     * Mostra na verdade todos os patrimônios do departamento
     */
    public function index(Contagem $contagem, Departamento $departamento)
    {
        return view('comissao.contagem.patrimonios.index', compact('contagem', 'departamento'));
    }

    public function show(Contagem $contagem, Departamento $departamento, Patrimonio $patrimonio)
    {
        return view('comissao.contagem.patrimonios.show', compact('contagem', 'departamento', 'patrimonio'));
    }

    public function create(Departamento $departamento)
    {
        return view('comissao.contagem.patrimonios.create', compact('departamento'));
    }

    public function store(Request $request, Contagem $contagem, Departamento $departamento, Patrimonio $patrimonio)
    {
        if (PatrimonioContado::where('patrimonio_id', $patrimonio->id)->exists()) {
            return redirect()->route('comissao.contagem.patrimonios.index', $departamento)
                ->with('error', 'Patrimônio já foi lido!');
        }
        $patrimonio = PatrimonioContado::create([
            'contagem_id' => $contagem->id,
            'departamento_id' => $departamento->id,
            'patrimonio_id' => $patrimonio->id,
            'usuario_id' => auth()->user()->id,
        ]);

        return redirect()->route('comissao.contagem.patrimonios.index', [$contagem, $departamento, $patrimonio])
            ->with('success', 'Patrimônio foi lido com sucesso!');
    }

    public function edit(Departamento $departamento, Patrimonio $patrimonio, PatrimonioContado $patrimonioContado)
    {
        return view('comissao.contagem.patrimonios.edit', compact('departamento', 'patrimonio', 'patrimonioContado'));
    }

    public function update(Request $request, Contagem $contagem, Departamento $departamento, PatrimonioContado $patrimonioContado)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            // 'valor' => 'required|numeric',
        ]);

        $patrimonioContado->update($validated);

        return redirect()->route('comissao.contagem.patrimonios.index', $departamento)
            ->with('success', 'Patrimônio foi atualizado com sucesso!');
    }

    public function destroy(Departamento $departamento, PatrimonioContado $patrimonioContado)
    {
        $patrimonioContado->delete();

        return redirect()->route('comissao.contagem.patrimonios.index', $departamento)
            ->with('success', 'Patrimônio foi deletado com sucesso!');
    }
}
