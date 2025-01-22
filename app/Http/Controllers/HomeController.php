<?php

namespace App\Http\Controllers;

use App\Enums\ContagemStatus;
use App\Models\Contagem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $ultimaContagem = Contagem::where('status', '!=', ContagemStatus::CANCELADO)->latest()->first();
        $diasDesdeUltimaContagem = $ultimaContagem ? $ultimaContagem->finalizado_em?->diffInDays() : null;

        return view('home', compact('ultimaContagem', 'diasDesdeUltimaContagem'));
    }
}
