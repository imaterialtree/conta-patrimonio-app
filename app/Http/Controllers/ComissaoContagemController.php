<?php

namespace App\Http\Controllers;

use App\Enums\ContagemStatus;
use App\Models\Contagem;
use App\Models\Departamento;
use Illuminate\Http\Request;

class ComissaoContagemController extends Controller
{
    public function index()
    {
        $usuario = auth()->user();
        $contagemExiste = Contagem::where('status', ContagemStatus::EM_ANDAMENTO)->exists();
        $contagem = $usuario->contagensComissao()->where('status', ContagemStatus::EM_ANDAMENTO)->first();

        return view('comissao.home', compact('contagem', 'contagemExiste'));
    }
    public function departamentos(Contagem $contagem)
    {
        $departamentos = Departamento::all();

        return view('comissao.contagem.departamentos', compact('departamentos', 'contagem'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
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
}
