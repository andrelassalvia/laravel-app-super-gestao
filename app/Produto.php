<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    //
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    // funcao para mostrar os detalhes do produto na view
    public function produtoDetalhe(){ // boa pratica colocar o nome da funcao igual ao model destino

        return $this->hasOne('App\ProdutoDetalhe'); 
        // o mesmo que Produto tem ProdutoDetalhe. relacionamento 1x1   
    }

    public function fornecedor(){

        return $this->belongsTo('App\Fornecedor');
    }
}
