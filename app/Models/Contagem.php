<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
}
