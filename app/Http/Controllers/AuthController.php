<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        // if (Auth::attempt(['email' => $request->email, 'senha' => $request->senha])) {
        //     return redirect()->intended('dashboard');
        // }
        // $senha = Hash::make($request->senha);
        $senha = $request->senha;

        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario  && Hash::check($senha, $usuario?->senha)) {
            Auth::login($usuario);
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'As credenciais não correspondem aos nossos registros.',
        ])->withInput(['email']);
    }

    public function logout()
    {
        return route('login');
    }
}
