<?php

namespace App\Http\Controllers;

use App\Models\Classificacao;
use App\Models\Departamento;
use App\Models\Patrimonio;
use Illuminate\Http\Request;

class PatrimonioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patrimonios = Patrimonio::all();
        $departamentos = Departamento::all();

        return view('patrimonio.index', compact('patrimonios', 'departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::all();
        $classificacoes = Classificacao::all();

        return view('patrimonio.create', compact('departamentos', 'classificacoes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:patrimonios|max:255',
            'descricao' => 'required|max:255',
            'departamento_id' => 'required|exists:departamentos,id',
            'classificacao_id' => 'required|exists:classificacoes,id',
        ]);

        Patrimonio::create($request->all());

        return redirect()->route('patrimonios.index')
            ->with('success', 'Patrimônio criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patrimonio $patrimonio)
    {
        return view('patrimonio.show', compact('patrimonio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patrimonio $patrimonio)
    {
        $departamentos = Departamento::all();
        $classificacoes = Classificacao::all();

        return view('patrimonio.edit', compact('patrimonio', 'departamentos', 'classificacoes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patrimonio $patrimonio)
    {
        $request->validate([
            'codigo' => 'required|max:255|unique:patrimonios,codigo,' . $patrimonio->id,
            'descricao' => 'required|max:255',
            'departamento_id' => 'required|exists:departamentos,id',
            'classificacao_id' => 'required|exists:classificacoes,id',
        ]);

        $patrimonio->update($request->all());

        return redirect()->route('patrimonios.index')
            ->with('success', 'Patrimônio atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patrimonio $patrimonio)
    {
        $patrimonio->delete();

        return redirect()->route('patrimonios.index')
            ->with('success', 'Patrimônio deletado com sucesso!');
    }
}
