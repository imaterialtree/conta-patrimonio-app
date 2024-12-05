<?php

namespace Database\Seeders;

use App\Models\User;
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
            ['nome' => 'Naoki', 'email' => 'naoki@email.com', 'senha' => Hash::make('senha123'), 'tipo' => 'admin']
        );

        $this->call([
            PatrimonioSeeder::class,
        ]);
    }
}
