<?php

namespace Database\Factories;

use App\Models\Classificacao;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patrimonio>
 */
class PatrimonioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => fake()->regexify('FOR\d{5,10}'),
            'descricao' => fake()->sentence(3),
            'departamento_id' => Departamento::factory(),
            'classificacao_id' => Classificacao::inRandomOrder()->value('id'),
        ];
    }
}
