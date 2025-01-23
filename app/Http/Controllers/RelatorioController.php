<?php

namespace App\Http\Controllers;

use App\Models\Contagem;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index()
    {
        return view('relatorio.index');
    }
}
