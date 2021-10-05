<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSiteContatosFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criar coluna motivo_contatos_id
        Schema::table('site_contatos', function(Blueprint $table){
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        // migrar dados da coluna 'motivo_contato' para coluna 'motivo_contatos_id'
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        // criando fk apontando para id da tabela motivo_contatos
        Schema::table('site_contatos', function(Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
        });

        // eliminar a coluna motivo_contato
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Adicionar a coluna motivo_contato e eliminando a foreign key
        Schema::table('site_contatos', function(Blueprint $table){
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        // Migrar todos os dados da coluna motivo_contatos_id para a motivo_contatos
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        // drop na coluna motivo_contatos_id
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
