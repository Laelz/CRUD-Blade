<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'data_nascimento',
        'turma_id',
        'cep',
        'endereco',
        'bairro',
        'cidade',
        'uf',
    ];

    public function turma()
    {
        return $this->belongsTo('App\Turma');
    }

    public function minhasCompras()
    {
        return $this->hasMany('App\Vendas');
    }
}
