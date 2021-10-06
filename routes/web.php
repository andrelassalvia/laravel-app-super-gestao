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

route::get('/','PrincipalController@principal')
    ->name('site.index')
    ->middleware(LogAcessoMiddleware::class);

Route::get('/sobre-nos', 'SobrenosController@sobreNos')
    ->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')
    ->name('site.contato')
    ->middleware(LogAcessoMiddleware::class);

Route::post('/contato', 'ContatoController@salvar')
    ->name('site.contato');

route::get('/login', function(){return 'login';})
    ->name('site.login');

route::prefix('/app')->group(function(){
    route::get('/clientes', function(){return 'clientes';})
        ->name('app.clientes');
        
    route::get('/fornecedor', 'FornecedorController@index')
        ->name('app.fornecedor');

    route::get('/produtos', function(){return 'produtos';})
        ->name('app.produtos');
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

