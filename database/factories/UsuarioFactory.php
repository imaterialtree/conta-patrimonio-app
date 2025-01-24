<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'senha' => static::$password ??= Hash::make('senha123'),
            'remember_token' => Str::random(10),
            'tipo' => fake()->randomElement(['admin', 'comissao']),
            'siape' => fake()->unique()->regexify('\d{9}'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin(bool $isAdmin)
    {
        return $this->state(fn(array $attributes) => [
            'tipo' => $isAdmin ? 'admin' : 'comissao',
        ]);
    }
}
