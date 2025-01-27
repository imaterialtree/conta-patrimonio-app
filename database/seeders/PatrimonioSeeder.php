<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Patrimonio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatrimonioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deps = Departamento::factory(5)->create();
        Patrimonio::factory()->create([
            'codigo' => 'FOR112233',
            'descricao' => 'Notebook Dell Latitude 7400',
            'departamento_id' => $deps->first()->id,
        ]);
        Patrimonio::factory()->create([
            'codigo' => 'FOR332211',
            'descricao' => 'Mesa de escritório',
            'departamento_id' => $deps->first()->id,
        ]);
        Patrimonio::factory(20)->create([
            'departamento_id' => fn() => $deps->random()->id,
        ]);
    }
}
