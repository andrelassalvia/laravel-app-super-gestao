<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato; // incluir o Model do SiteContato
use App\MotivoContatos;

class ContatoController extends Controller
{
    public function contato(){

        $motivo_contatos = MotivoContatos::all();
        
        
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

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',  // validar nome como obrigatorio e com um minimo de 3 caracteres e no maximo 40
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.min'=> 'O campo nome deve ter ao menos 3 caracteres.',
            'nome.max'=> 'O campo nome deve ter no máximo 40 caracteres.',
            'nome.unique'=> 'Este nome já foi gravado no banco de dados.',
            'telefone.required'=> 'O campo telefone deve ser preenchido.',
            'email.email'=> 'O campo email deve possuir @ e um domínio.',
            'motivo_contatos_id.required' => 'Escolha um motivo de contato.',
            'mensagem.required' => 'O preenchimento da mensagem é obrigatório.',
            'mensagem.max' => 'A mensagem deve possuir no máximo 2000 caracteres.',

            'required'=> 'O campo :attribute deve ser preenchido' // :attribute resgata o name do campo.
        ];

        $motivo_contatos = MotivoContatos::all();

        // realizar a validacao dos dados recebidos no request
        $request->validate($regras, $feedback);    

        SiteContato::create($request->all());
        return redirect()->route('site.index');
        
    }
   
}

// A escolha de qual forma iremos passar as informacoes depende se precisamos ou nao tratar alguma informacao especifica. Por vezes precisamos checar alguma formatacao antes de enviar o formulario, dai utilizamos a primeira forma.