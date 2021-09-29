<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // SiteContato::create([
        //     'nome' => 'Sistema SG',
        //     'telefone' => '(11) 4555-5555',
        //     'email' => 'contato@sg.com.br',
        //     'motivo_contato' => 1,
        //     'mensagem' => 'Seja bem vindo ao sistema SG',
        // ]);

        factory(SiteContato::class, 100)->create();

       
        
    }
}
