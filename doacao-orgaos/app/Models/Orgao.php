<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orgao extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'patient'];

    // Relacionamento com usuários
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'usuario_orgao')
            ->withPivot('tipo') // Adiciona a coluna 'tipo' no relacionamento
            ->withTimestamps();
    }
}


