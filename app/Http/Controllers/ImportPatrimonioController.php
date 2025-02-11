<?php

namespace App\Http\Controllers;

use App\Jobs\ImportPatrimonioJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportPatrimonioController extends Controller
{
    public function showImportForm()
    {
        return view('patrimonio.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $path = $request->file('csv_file')->store('imports');

        ImportPatrimonioJob::dispatch($path);

        return redirect()->back()->with('success', 'Importação iniciada. Você será notificado quando estiver concluída.');
    }
}
