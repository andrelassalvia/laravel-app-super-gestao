<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SiteContato extends Model
{
    use SoftDeletes;

    // usar fillable para permitir gravacao usando o metodo create diretamente
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];


}
