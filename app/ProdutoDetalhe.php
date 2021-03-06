<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    //
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    // funcao para receber as informacoes do produto na view edit do produto detalhe
    public function produto(){

        return $this->belongsTo('App\Produto');
    }
}
