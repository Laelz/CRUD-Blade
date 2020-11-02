<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'data_nascimento',
        'estoque',
        'preco',
    ];

    public function turma(){
        return $this->belongsToMany('App\Turma', 'turma_materiais');
    }

    
    
    
}
