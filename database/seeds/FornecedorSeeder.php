<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Instrucoes para criacao dos registros no BD - mais a frente entra como parametros
        // utilizando 3 tecnicas diferentes para fazer a mesma coisa

        // instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email ='fornecedor100@contato.com.br';
        $fornecedor->save();

        // metodo create - atencao ao fillable
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'MA',
            'email'=> 'fornecedor200@contato.com.br'
        ]);

        // metodo insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'SP',
            'email'=> 'fornecedor300@contato.com.br'
        ]);
    }
}
