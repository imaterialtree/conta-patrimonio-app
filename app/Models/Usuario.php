<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';
    const DELETED_AT = 'excluido_em';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'siape',
        'tipo',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'senha' => 'hashed',
    ];

    // Relacionamentos
    public function contagensCriadas(): HasMany
    {
        return $this->hasMany(Contagem::class);
    }

    public function contagensComissao(): BelongsToMany
    {
        return $this->belongsToMany(Contagem::class);
    }

    public function patrimonios(): BelongsToMany
    {
        return $this->belongsToMany(Patrimonio::class)->using(ContagemPatrimonio::class);
    }
}
