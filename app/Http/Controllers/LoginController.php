<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //
    public function index(Request $request){


        $erro = '';
        switch ($request->get('erro')) {
            case 1:
                $erro = 'Usuário ou senha não cadastrado';
                break;
            case 2:
                $erro = 'Login necessário para acesso à página';
                break;
            
            default:
                $erro = '';
                break;
        }
        // if($request->get('erro') == 1){
        //     $erro = 'Usuário ou Senha não cadastrado';
        // }  
        return view ('site.login', ['titulo' => 'Super Gestão - login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        
        // regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (email) é obrigatório.',
            'senha.required' => 'O campo senha é obrigatório.'
        ];

        $request->validate($regras, $feedback);

        // recuperar os dados do formulario para variaveis
        $email = $request->get('usuario');    // nome da variável igual ao campo da tabela users
        $password = $request->get('senha');

        // Iniciar o Model User
        $users = new User();

        $usuario = $users->where('email', $email)
                        ->where('password', $password)
                        ->get()
                        ->first(); // quando a comparação é por igualdade podemos omitir o parâmetro do meio
        
        if(isset($usuario)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');

        } else{
            return redirect()->route('site.login', ['erro'=>1]);
        }

        // echo '<pre>';
        // print_r($usuario);
        // echo '</pre>';
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
