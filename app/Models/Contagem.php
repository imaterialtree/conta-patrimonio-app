<?php

namespace App\Models;

use App\Enums\PatrimonioStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contagem extends Model
{
    use HasFactory;

    protected $table = 'contagens';

    const CREATED_AT = 'criado_em';

    const UPDATED_AT = 'atualizado_em';

    protected $fillable = [
        'status',
        'finalizado_em',
        'usuario_criador_id',
    ];

    protected $casts = [
        'finalizado_em' => 'datetime',
    ];

    // Relacionamentos
    public function usuarioCriador(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_criador_id');
    }

    public function usuariosComissao(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class);
    }

    public function patrimoniosContados(): HasMany
    {
        return $this->hasMany(PatrimonioContado::class);
    }

    public function progresso(): int
    {
        return $this->patrimoniosContados()->count();
    }

    public function patrimoniosContadosDepartamento(Departamento $departamento)
    {
        return $this->patrimoniosContados()->whereRelation('patrimonio', 'departamento_id', $departamento->id);
    }

    public function progressoDepartamento(Departamento $departamento): int
    {
        return $this->patrimoniosContadosDepartamento($departamento)->count();
    }

    public function patrimonioStatus(Patrimonio $patrimonio): PatrimonioStatus
    {
        $patrimonioContado = $this->patrimoniosContados()->where('patrimonio_id', $patrimonio->id)->first();

        if ($patrimonioContado === null) {
            return PatrimonioStatus::NAO_LIDO;
        }

        return match ((bool) $patrimonioContado->nao_encontrado) {
            true => PatrimonioStatus::NAO_ENCONTRADO,
            false => PatrimonioStatus::LIDO,
        };
    }

    public function podeFinalizar(): bool
    {
        return $this->status === 'Em andamento' && $this->progresso() === Patrimonio::count();
    }
}
