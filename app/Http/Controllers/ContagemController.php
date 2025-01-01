<?php

namespace App\Http\Controllers;

use App\Models\Contagem;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ContagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contagens = Contagem::all();
        return view('contagem.index', compact('contagens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $membros = Usuario::all();
        return view('contagem.create', compact('membros'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return to_route('contagens.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contagem $contagem)
    {
        return view('contagem.show', compact('contagem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
