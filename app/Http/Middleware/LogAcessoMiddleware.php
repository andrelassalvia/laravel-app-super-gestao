<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) // funcao handle executada automaticamente quando esse middleware é ativado.
                                                    // para ativar um middleware precisamos atribui-lo a rotas ou controladores 
    {
        // dd($request); 
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();

        // $request - manipular
        // return $next($request); // $next manda o request em frente
        LogAcesso::create([
            'log' => "IP $ip requisitou a rota $rota" // esta mensagem sera armazenada no BD
        ]);

        //     'log'=> 'IP xyz requisitou a rota ABCD'
        // queremos a mensagem: IP xyz requisitou a rota ABCD;
        // return Response('Chegamos no e finalizamos o Middleware'); // Response é a volta da informação para o solicitante.
        $resposta = $next($request); // estou recuperando a resposta e colocando na variavel
        $resposta->setStatusCode('201', 'Manipulando o texto');
       
        return $resposta;
        
    }
}
