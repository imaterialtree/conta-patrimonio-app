<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('env:file', function () {
    $environmentFile = app()->environmentFile();
        $this->info("Arquivo env atual: $environmentFile");
        return 0;
})->purpose('Informa qual o arquivo env atual');
