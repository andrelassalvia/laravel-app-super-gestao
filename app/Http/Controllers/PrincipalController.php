<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContatos;

class PrincipalController extends Controller
{public function principal(){

    $motivo_contatos = MotivoContatos::all();
    return view('site.principal', ['motivo_contatos'=>$motivo_contatos]);}}

 
