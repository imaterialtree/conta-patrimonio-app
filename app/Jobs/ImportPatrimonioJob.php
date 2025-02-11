<?php

namespace App\Jobs;

use App\Models\Patrimonio;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use League\Csv\Reader;

class ImportPatrimonioJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $csv = Reader::createFromPath($this->filePath, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            Patrimonio::updateOrCreate(
                ['codigo' => $record['codigo']],
                [
                    'descricao' => $record['descricao'],
                    'departamento_id' => $record['departamento_id'],
                    'classificacao_id' => $record['classificacao_id'],
                ]
            );
        }
    }
}
