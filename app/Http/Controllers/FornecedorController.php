<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FornecedorController extends Controller
{
    public function index(){
        
        return view('app.fornecedor');

    }

    // public function __construct(){
    //     $this->middleware('log.acesso', 'autenticacao');
    // }
}
