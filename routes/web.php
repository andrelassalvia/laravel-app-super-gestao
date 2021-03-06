<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

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

Route::post('/contato', 'ContatoController@salvar')
    ->name('site.contato');

route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
route::post('/login', 'LoginController@autenticar')->name('site.login');

// grupo aplicativo
route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function(){
    route::get('/home', 'HomeController@index')->name('app.home');
    route::get('/sair', 'LoginController@sair')->name('app.sair');

    // fornecedor
    route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    // produto
    route::resource('produto', 'ProdutoController');
    route::resource('produto-detalhe', 'ProdutoDetalheController');
    route::resource('cliente', 'ClienteController');
    route::resource('pedido', 'PedidoController');
    route::get('/pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido_produto.create');
    route::post('/pedido-produto/create/{pedido}', 'PedidoProdutoController@store')->name('pedido_produto.store');
    // route::delete('/pedido-produto/destroy/{pedido}{produto}', 'PedidoProdutoController@destroy')->name('pedido_produto.destroy');
    route::delete('/pedido-produto/destroy/{pedidoProduto}', 'PedidoProdutoController@destroy')->name('pedido_produto.destroy');

    
});



// route::get('/rota1',function(){
//     echo 'rota1';

// })->name('site.rota1');


// route::get('/rota2', function(){
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

// Route::redirect('/rota2','/rota1');

route::fallback(function(){
    echo 'A pagina acessada nao existe. <a href="'.route('site.index').'">Clique aqui</a> para voltar a pagina inicial';
});

