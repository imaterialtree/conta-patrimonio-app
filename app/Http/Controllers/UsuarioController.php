<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        $userCount = $usuarios->count();
        return view('usuario.index', compact('usuarios', 'userCount'));
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(UsuarioRequest $request)
    {
        $user = Usuario::make($request->validated());
        $user->senha = Hash::make('senha123');
        $user->save();

        return to_route('usuarios.index')->with('success', 'Usuário criado com sucesso');
    }

    public function show(Usuario $usuario)
    {
        return view('usuario.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        if (url()->previous() != url()->current()) {
            session(['previousUrl' => url()->previous()]);
        }

        return view('usuario.edit', compact('usuario'));
    }

    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        $usuario->update($request->validated());
        $previousUrl = session()->pull('previousUrl', route('usuarios.index'));

        return redirect($previousUrl)->with('success', 'Usuário atualizado com sucesso');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
    }
}
