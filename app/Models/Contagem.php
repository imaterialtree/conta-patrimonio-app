<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contagem extends Model
{
    use HasFactory;

    protected $table = 'contagens';

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';
    // const DELETED_AT = 'finalizado_em';

    protected $fillable = [
        'status',
        'finalizado_em'
    ];

    protected $casts = [
        'finalizado_em' => 'datetime',
    ];

    // Relacionamentos
    public function usuarioCriador(): HasOne
    {
        return $this->hasOne(Usuario::class);
    }

    public function usuariosComissao(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class);
    }
}
