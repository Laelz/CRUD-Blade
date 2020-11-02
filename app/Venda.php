<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'nome',
        'data_nascimento',
        'estoque',
        'preco',
    ];

    public function turma(){
        return $this->belongsToMany('App\Produto', 'turma_materiais');
    }

    public function produtos(){
        return $this->belongsToMany('App\Produtos', 'venda_item');
    }
}
