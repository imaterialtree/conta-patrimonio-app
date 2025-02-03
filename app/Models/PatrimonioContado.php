<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatrimonioContado extends Model
{
    protected $table = 'patrimonios_contados';

    const CREATED_AT = 'criado_em';

    const UPDATED_AT = 'atualizado_em';

    const DELETED_AT = 'excluido_em';

    protected $fillable = [
        'contagem_id',
        'departamento_id',
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

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }

    public function patrimonio(): BelongsTo
    {
        return $this->belongsTo(Patrimonio::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function classificacaoProposta(): BelongsTo
    {
        return $this->belongsTo(Classificacao::class);
    }

    public function scopeNaoEncontrados($query)
    {
        return $query->where('nao_encontrado', true);
    }

    public function scopeDiferenteLocal($query)
    {
        return $query->whereHas('patrimonio', function ($q) {
            $q->whereColumn('patrimonios_contados.departamento_id', '!=', 'patrimonios.departamento_id');
        });
    }
}
