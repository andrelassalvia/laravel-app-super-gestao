<?php

use Illuminate\Database\Seeder;
use App\MotivoContatos;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MotivoContatos::create(['motivo_contato' => 'Dúvida']);
        MotivoContatos::create(['motivo_contato' => 'Elogio']);
        MotivoContatos::create(['motivo_contato' => 'Reclamação']);
    }
}
