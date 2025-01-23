<?php

namespace App\Http\Controllers;

use App\Enums\ContagemStatus;
use App\Models\Contagem;
use App\Models\Departamento;
use App\Models\Patrimonio;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ContagemController extends Controller
{
    public function index()
    {
        $contagens = Contagem::all();

        return view('contagem.index', compact('contagens'));
    }

    public function create()
    {
        if (Contagem::where('status', ContagemStatus::EM_ANDAMENTO)->exists()) {
            return back()->withErrors(['contagem' => 'Já existe uma contagem em andamento!']);
        }
        $membros = Usuario::all();

        return view('contagem.create', compact('membros'));
    }

    public function store(Request $request)
    {
        if (Contagem::where('status', ContagemStatus::EM_ANDAMENTO)->exists()) {
            return back()->withErrors(['contagem' => 'Já existe uma contagem em andamento!']);
        }
        
        $request->validate([
            'membros' => 'required',
            'membros.*' => 'exists:usuarios,id',
        ]);

        $contagem = $request->user()->contagensCriadas()->create([
            'status' => ContagemStatus::EM_ANDAMENTO,
        ]);
        $contagem->usuariosComissao()->attach($request->membros);

        return to_route('contagens.show', $contagem);
    }

    public function show(Contagem $contagem)
    {
        $departamentos = Departamento::all();
        $patrimoniosContados = $contagem->patrimoniosContados;
        $patrimonioTotal = Patrimonio::count();

        return view('contagem.show', compact('contagem', 'departamentos', 'patrimoniosContados', 'patrimonioTotal'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function finalizar(Contagem $contagem)
    {
        $contagem->update([
            'status' => 'Finalizado',
            'finalizado_em' => now(),
        ]);

        return back();
    }

    public function cancelar(Contagem $contagem)
    {
        $contagem->update([
            'status' => ContagemStatus::CANCELADO,
        ]);

        return back();
    }

    public function sugestoes(Contagem $contagem)
    {
        $patrimoniosContados = $contagem->patrimoniosContados()->whereNotNull('classificacao_proposta_id')->get();

        return view('relatorio.sugestoes', compact('contagem', 'patrimoniosContados'));
    }
}
