<?php

namespace App\Http\Controllers;

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
        $membros = Usuario::all();

        return view('contagem.create', compact('membros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'membros' => 'required',
            'membros.*' => 'exists:usuarios,id',
        ]);

        $contagem = $request->user()->contagensCriadas()->create([
            'status' => 'Em andamento',
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
}
