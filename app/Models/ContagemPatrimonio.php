<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContagemPatrimonio extends Model
{
    protected $fillable = [
        'contagem_id',
        'patrimonio_id',
        'usuario_id',
        'classificacao_proposta_id',
        'foto',
        'nao_encontrado',
        'justificativa',
    ];

    protected $casts = [
        'nao_encontrado' => 'boolean',
    ];

    // Relacionamentos
    public function contagem(): BelongsTo
    {
        return $this->belongsTo(Contagem::class);
    }

    public function patrimonio(): BelongsTo
    {
        return $this->belongsTo(Patrimonio::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function novaClassificacao(): BelongsTo
    {
        return $this->belongsTo(Classificacao::class);
    }

    public function antigaClassificacao(): BelongsTo
    {
        return $this->belongsTo(Classificacao::class);
    }
}
