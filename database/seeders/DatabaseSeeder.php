<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Usuario::firstOrCreate(
            ['email' => 'admin@email'],
            ['nome' => 'Admin User', 'email' => 'admin@email', 'senha' => Hash::make('senha123'), 'tipo' => 'admin']
        );

        Usuario::firstOrCreate(
            ['email' => 'comissao@email'],
            ['nome' => 'Comissao User', 'email' => 'comissao@email', 'senha' => Hash::make('senha123'), 'tipo' => 'comissao']
        );

        $this->call([
            PatrimonioSeeder::class,
            UsuarioSeeder::class,
        ]);
    }
}
