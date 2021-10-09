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


route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function(){
    route::get('/home', 'HomeController@index')->name('app.home');
    route::get('/sair', 'LoginController@sair')->name('app.sair');
    route::get('/cliente', function(){return 'clientes';})
        ->name('app.cliente');
        
        
    route::get('/fornecedor', 'FornecedorController@index')
        ->name('app.fornecedor.index');
        

    route::get('/produto', function(){return 'produtos';})
        ->name('app.produto');
});

route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

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

