<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // criar a table filiais
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });
 
        // criar a tabela produtos_filiais
        Schema::create('produto_filiais', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            // preco de venda, estoques minimos e maximos tbem variam conforme a filial
            // estas colunas devem ser removidas da tabela produtos
            $table->decimal('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
            $table->timestamps();

            // chave estrangeira entre filiais e produtos_filiais
            $table->foreign('filial_id')->references('id')->on('filiais');


            // chave estrangeira entre produtos e produtos_filiais
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        // removendo as colunas preco de venda, estoques minimos e maximos da tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn('preco_venda');
            $table->dropColumn('estoque_minimo');
            $table->dropColumn('estoque_maximo');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // retirar a chave filial_id e produtos_id
        Schema::table('produto_filiais', function (BluePrint $table){
            $table->dropForeign('produto_filiais_filial_id_foreign');
            $table->dropForeign('produto_filiais_produto_id_foreign');

        });

        // recolocar as colunas preco de venda, estoques minimos e maximos na tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->float('preco_venda', 8,2);
            $table->integer('estoque_maximo');
            $table->integer('estoque_minimo');
        });
        // drop da tabela filiais-produtos
        Schema::dropIfExists('produto_filiais');

        // drop da tabela filiais
        Schema::dropIfExists('filiais');

    }
}
