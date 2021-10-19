<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPedidoProdutosAddQuantidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        schema::table('pedido_produtos', function (Blueprint $table){
            $table->integer('quantidade')->after('pedido_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        schema::table('pedido_produtos', function(Blueprint $table){
            $table->dropColumn('quantidade');
        });
    }
}
