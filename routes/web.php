<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return 'Olá seja bem-vindo ao curso de Laravel';
});
*/

route::get('/','PrincipalController@principal');

Route::get('/sobre-nos', 'SobrenosController@sobreNos');
Route::get('/contato', 'ContatoController@contato');

// vamos colocar os seguintes parametros do contato:
// nome, categoria, assunto e memsagem
route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem?}', function(string $nome, string $categoria, string $assunto, string $mensagem = 'nao definida'){
    echo    'Estamos aqui'.' '. $nome.'! Vamos falar dos'. ' '.$categoria.' '.'pois o assunto hoje esta'.' '.$assunto.' '.'com a mensagem'. ' '.$mensagem;
    echo '<br>';
    echo "EStamos aqui com $nome falando da categoria $categoria sobre o assunto $assunto com a mensagem $mensagem.";
});
