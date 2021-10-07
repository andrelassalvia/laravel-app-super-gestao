<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        if($metodo_autenticacao == 'padrao'){
            echo "Exige metodo de autenticacao padrao"." -$perfil".'<br>';
        } elseif ($metodo_autenticacao == 'ldap') {
            echo 'Exige autenticacao ldap'. " -$perfil".'<br>';
        }

        if(false){
            return $next($request);

        } else{
            
            return Response('Acesso negado. Exige autenticacao!');
        }


        // return $next($request);
    }
}
