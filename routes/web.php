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

route::get('/','PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobrenosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
route::get('/login', 'LoginController@login')->name('site.login');

route::prefix('/app')->group(function(){
    route::get('/clientes', 'ClientesController@clientes')->name('app.clientes');
    route::get('/fornecedores', 'FornecedoresController@fornecedores')->name('app.fornecedores');
    route::get('/produtos', 'ProdutosController@produtos')->name('app.produtos');
});

route::get('/rota1',function(){
    echo 'rota1';

})->name('site.rota1');


route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');

// Route::redirect('/rota2','/rota1');

route::fallback(function(){
    echo 'A pagina acessada nao existe. <a href="'.route('site.index').'">Clique aqui</a> para voltar a pagina inicial';
});

