<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //

    public function cliente(){
        return $this->belongsTo('App\Cliente', 'cliente_id', 'id');
    }

    public function produtos(){
        return $this->belongsToMany('App\Produto', 'pedido_produtos', 'pedido_id', 'produto_id')->withPivot('created_at', 'id');
    }
}
