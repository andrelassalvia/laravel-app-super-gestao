<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    //
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    // funcao para mostrar os detalhes do produto na view
    public function produtoDetalhe(){ // boa pratica colocar o nome da funcao igual ao model destino

        return $this->hasOne('App\ProdutoDetalhe', 'produto_id', 'id'); 
        // o mesmo que Produto tem ProdutoDetalhe. relacionamento 1x1   
    }

    public function fornecedor(){

        return $this->belongsTo('App\Fornecedor', 'fornecedor_id', 'id');
    }

    public function unidade(){

        return $this->belongsTo('App\Unidade', 'unidade_id', 'id');
    }
}
