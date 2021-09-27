<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhe', function (Blueprint $table) {

            // colunas
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento', 8, 2);
            $table->float('largura', 8 ,2);
            $table->float('altura', 8, 2);
            $table->timestamps();

            // constraint de relacionamento
            $table->foreign('produto_id')->references('id')->on('produtos'); // determinar como chave estrangeira
            $table->unique('produto_id'); // garantir o relacionmento 1:1
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhe');
    }
}
