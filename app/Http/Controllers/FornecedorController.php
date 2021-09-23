<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome'=> 'Fornecedor 1', 
                'status'=>'N',
                'cnpj' => '00.000.000/000-00',
                'DDD' => '11', // Sao Paulo (SP)
                'telefone' => '2547-5587'
            ],
            
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => '01.000.000/0001-00',
                'DDD' => '85', // Fortaleza (CE)
                'telefone' => '0001-2541'
            ],

            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => '',
                'DDD' => '32', // Juiz de Fora (MG)
                'telefone' => '4474-5587'
                
            ],

            3 => [
                'nome' => 'Fornecedor 4',
                'status' => 'N',
                'DDD' => '',
                               
                
            ]

        ];
        
        return view('app.fornecedor.index', compact('fornecedores'));

    }
}
