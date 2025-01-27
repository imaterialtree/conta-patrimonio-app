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
        $departamentos = Departamento::with(['patrimonios' => function ($query) use ($search) {
            if ($search) {
                $query->where('descricao', 'like', "%{$search}%")
                        ->orWhere('codigo', 'like', "%{$search}%");
            }
        }])->get();

        return view('comissao.patrimonios', compact('departamentos'));
    }

    public function showPatrimonio(Request $request)
    {
        $codigo = $request->input('codigo');
        $patrimonio = Patrimonio::where('codigo', $codigo)->first();
        if (!$patrimonio) {
            return redirect()->back()->with('error', 'Patrimônio não encontrado.');
        }

        return view('comissao.patrimonios.show', compact('patrimonio'));
    }
}
