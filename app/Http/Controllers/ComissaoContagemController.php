<?php

namespace App\Http\Controllers;

use App\Enums\ContagemStatus;
use App\Models\Contagem;
use App\Models\Departamento;
use App\Models\Patrimonio;
use Illuminate\Http\Request;

class ComissaoContagemController extends Controller
{
    public function index()
    {
        $usuario = auth()->user();
        $contagemExiste = Contagem::where('status', ContagemStatus::EM_ANDAMENTO)->exists();
        $contagem = $usuario->contagensComissao()->where('status', ContagemStatus::EM_ANDAMENTO)->first();

        return view('comissao.index', compact('contagem', 'contagemExiste'));
    }
    public function departamentos(Contagem $contagem)
    {
        $departamentos = Departamento::all();
        
        return view('comissao.contagem.departamentos', compact('departamentos', 'contagem'));
    }

    public function patrimonios(Request $request)
    {
        $search = $request->input('search');
        $patrimonios = Patrimonio::with('departamento')->when($search, function ($query, $search) {
            $query->where('descricao', 'like', "%{$search}%")
                  ->orWhere('codigo', 'like', "%{$search}%");
        })->orderBy('departamento_id')->paginate(10);

        $departamentos = $patrimonios->groupBy('departamento.titulo');

        return view('comissao.patrimonios.search', compact('patrimonios', 'departamentos'));
    }

    public function showPatrimonio(Request $request)
    {
        $codigo = $request->input('codigo');
        $patrimonio = Patrimonio::where('codigo', $codigo)->first();
        if (!$patrimonio) {
            return redirect()->back()->withErrors('Patrimônio não encontrado');
        }

        return view('comissao.patrimonios.show', compact('patrimonio'));
    }
}
