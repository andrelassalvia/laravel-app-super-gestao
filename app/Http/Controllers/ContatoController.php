<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato; // incluir o Model do SiteContato

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = [
            '1'=> 'Dúvida',
            '2'=> 'Elogio',
            '3'=> 'Reclamação'
        ];
        
        /*
        $contato = new SiteContato(); // instancia a classe SiteContato e depois preenche os atributos deste objeto
        // Preenchemos os atributos utilizando o objeto request, chamando o metodo input e recuperando o parametro necessario
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        // print_r($contato->getAttributes());
        // apos o objeto contato ter sido preenchido com os valores do formulario, basta executarmos um metodo save() que o array lá disposto será enviado para o BD
        if($contato->nome && $contato->telefone && $contato->email && $contato->motivo_contato && $contato->mensagem){

            $contato->save();
        }
        */

        // Alem do metodo acima, temos outras possibilidades de fazermos a mesma coisa.
        
        // vamos passar todas as informacoes atraves de um array associativo com fill
        /*
        $contato = new SiteContato();
        $contato->fill($request->all());
            if($contato->nome && $contato->telefone && $contato->email && $contato->motivo_contato && $contato->mensagem){
                 $contato->save();
            }
        // print_r($contato->getAttributes());
        */

        // Ou um array associativo com create
        /*
        $contato = new SiteContato();
        $contato->create($request->all());
        */

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
        
    }

    public function salvar(Request $request){
        // dd($request);

        // realizar a validacao dos dados recebidos no request
        $request->validate([
            'nome' => 'required|min:3|max:40',  // validar nome como obrigatorio e com um minimo de 3 caracteres e no maximo 40
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
            
        ]);

        SiteContato::create($request->all());

    }
}

// A escolha de qual forma iremos passar as informacoes depende se precisamos ou nao tratar alguma informacao especifica. Por vezes precisamos checar alguma formatacao antes de enviar o formulario, dai utilizamos a primeira forma.