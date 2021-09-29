<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresColumnSoftDeletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Incluir a softDeletes
        Schema::table('fornecedores', function(Blueprint $table){
            $table->softDeletes()->after('email');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Retira a coluna SoftDeletes
        Schema::$table('Fornecedores', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
}
