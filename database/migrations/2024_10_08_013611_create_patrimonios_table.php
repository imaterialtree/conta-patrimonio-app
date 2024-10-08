<?php

use App\Models\Classificacao;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patrimonios', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em')->nullable();
            $table->timestamp('excluido_em')->nullable();
            $table->foreignId('departamento_id')->constrained('departamentos');
            $table->foreignId('classificacao_id')->constrained('classificacoes');
        });

        Schema::create('classificacoes', function (Blueprint $table) {
            $table->id();
            $table->titulo();
        });

        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em')->nullable();
            $table->timestamp('excluido_em')->nullable();
        });

        // Preencher banco
        DB::insert(Classificacao::class, [
            ['titulo' => 'Novo'],
            ['titulo' => 'Em Uso'],
            ['titulo' => 'Ocioso'],
            ['titulo' => 'Ocioso de Baixa Utilização'],
            ['titulo' => 'Recuperável'],
            ['titulo' => 'Antieconômico'],
            ['titulo' => 'Irrecuperável'],
            ['titulo' => 'Alienado'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patrimonios');
        Schema::dropIfExists('classificacoes');
        Schema::dropIfExists('departamentos');
    }
};