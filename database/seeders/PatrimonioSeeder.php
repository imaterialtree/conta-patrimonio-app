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
        Patrimonio::factory(50)->create([
            'departamento_id' => fn() => $deps->random()->id,
        ]);
    }
}
