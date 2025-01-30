<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('guest.index');
    }

    public function patrimoniosIndex(Request $request)
    {
        $search = $request->input('search');
        $patrimonios = Patrimonio::with('departamento')->when($search, function ($query, $search) {
            $query->where('descricao', 'like', "%{$search}%")
                  ->orWhere('codigo', 'like', "%{$search}%");
        })->orderBy('departamento_id')->paginate();

        $departamentos = $patrimonios->groupBy('departamento.titulo');

        return view('guest.patrimonios.index', compact('patrimonios', 'departamentos'));
    }

    public function patrimoniosShow(Request $request)
    {
        $codigo = $request->input('codigo');
        $patrimonio = Patrimonio::where('codigo', $codigo)->first();
        if (!$patrimonio) {
            return redirect()->back()->withErrors('Patrimônio não encontrado');
        }

        return view('guest.patrimonios.show', compact('patrimonio'), ['layout' => 'guest']);
    }
}
