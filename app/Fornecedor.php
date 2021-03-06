<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// quando criamos o modelo criamos no singular - Fornecedor
// quando criamos a tabela o fazemos no plural - Fornecedores

// por padrao o Laravel faz o seguinte:
// SiteContato - class
// Site_Contato - coloca underline antes da segunda maiuscula
// site_contato - passa tudo para minusculo
// site_contatos - coloca um s no final para passar para o plural

// com Fornecedor nao da para simplesmente colocar um s no final
// precisamos utilizar o metodo protected


class Fornecedor extends Model

{   
    // permitir usar o softDeletes -> nao esquecer de acrescentar no namespace
    use SoftDeletes;
    // acertando o plural de Fornecedor
    protected $table = 'fornecedores';

    // usar fillable para permitir gravacao usando o metodo create diretamente no tinker
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos(){
        return $this->hasMany('App\Produto', 'fornecedor_id', 'id');
    }

}
