<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patrimonio extends Model
{
    use HasFactory, SoftDeletes;

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';
    const DELETED_AT = 'excluido_em';

    protected $fillable = [
        'titulo',
        'descricao',
    ];

    // Relacionamento
    public function classificacao(): HasOne
    {
        return $this->hasOne(Classificacao::class);
    }
    
    public function departamento(): HasOne
    {
        return $this->hasOne(Departamento::class);
    }
    
    public function contagem(): BelongsToMany
    {
        return $this->belongsToMany(Contagem::class)->using(ContagemPatrimonio::class);
    }
}
