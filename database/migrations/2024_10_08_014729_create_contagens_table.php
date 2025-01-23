<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_criador_id')->constrained('usuarios');
            $table->enum('status', ['Em andamento', 'Finalizado', 'Cancelado']);
            $table->string('observacao')->nullable();
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em')->nullable();
            $table->timestamp('finalizado_em')->nullable();
        });

        Schema::create('patrimonios_contados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contagem_id')->constrained('contagens');
            $table->foreignId('departamento_id')->constrained('departamentos');
            $table->foreignId('patrimonio_id')->constrained('patrimonios');
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->foreignId('classificacao_proposta_id')->nullable()->constrained('classificacoes');
            $table->string('foto')->nullable();
            $table->boolean('nao_encontrado')->default(false);
            $table->text('justificativa')->nullable();
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em')->nullable();
            $table->timestamp('finalizado_em')->nullable();
        });

        Schema::create('contagem_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contagem_id')->constrained('contagens');
            $table->foreignId('usuario_id')->constrained('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contagens');
        Schema::dropIfExists('contagem_patrimonios');
        Schema::dropIfExists('contagem_usuario');
    }
};
