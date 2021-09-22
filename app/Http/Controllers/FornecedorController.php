<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome'=> 'Fornecedor1', 
                'status'=>'N',
                'cnpj' => '00.000.000/000-00'
            ],
            
            1 => [
                'nome' => 'Fornecedor2',
                'status' => 'S',
                'cnpj' => '01.000.000/0001-00'
            ],

            2 => [
                'nome' => 'Fornecedor3',
                'status' => 'S',
                'cnpj' => ''
                
            ],

            3 => [
                'nome' => 'Fornecedor4',
                'status' => 'N',
                
                
            ]

        ];
        
        return view('app.fornecedor.index', compact('fornecedores'));

    }
}
