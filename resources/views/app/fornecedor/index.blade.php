<h3>Fornecedor</h3>

{{-- aqui dentro fica o comentario que nao sera interpretado. --}}

@php
 // para fazermos uma secao pura de php basta iniciarmos e fecharmos uma secao com @

 // echo 'texto de teste';

/*
 if (){

 } elseif (){

 } else*/

@endphp

{{-- para usar um array vindo de uma variavel no laravel  --}}
{{-- @dd($fornecedores) --}}

{{-- @if(count($fornecedores) > 0 && count($fornecedores) < 10){
    <h3>Existem alguns fornecedores cadastrados</h3>
} @elseif(count($fornecedores) > 10){
    <h3>Existem muitos fornecedores cadastrados</h3>
}@else{
    <h3>Nao existem fornecedores cadastrados.</h3>
}
@endif --}}

{{-- @unless é uma inversao de @if --}}

{{-- @dd($fornecedores) --}}

{{-- @if($fornecedores[0]['status'] === 'N')
    <p>Fornecedor inativo</p>

@endif --}}
{{-- mas podemos usar o @unless para fazer a negacao como se fosse ! --}}

{{-- @unless($fornecedores[0]['status'] === 'S')
Fornecedor Inativo
@endunless --}}

{{-- @isset - verificar se variaveis, arrays estao definidos. Retorna True or False --}}


@isset($fornecedores)
    CNPJ: {{ $fornecedores[3]['cnpj'] ?? 'Dado nao foi preenchido' }}
    <br>
    <br>
    @isset($fornecedores[0]['nome'])
    Fornecedor: {{$fornecedores[0]['nome']}}
    @endisset
    <br>
    @isset($fornecedores[0]['status'])
    Status:{{$fornecedores[0]['status']}}
    @endisset
    <br>
    @isset($fornecedores[0]['cnpj'])
    CNPJ:{{$fornecedores[0]['cnpj']}}
        @empty($fornecedores[0]['cnpj'])
        Nao definidos
        @endempty
    @endisset
    <br>
    <br>
    @isset($fornecedores[1]['nome'])
    Fornecedor: {{$fornecedores[1]['nome']}}
    @endisset
    <br>
    @isset($fornecedores[1]['status'])
    Status:{{$fornecedores[1]['status']}}
    @endisset
    <br>
    @isset($fornecedores[1]['cnpj'])
    CNPJ:{{$fornecedores[1]['cnpj']}}
        @empty($fornecedores[1]['cnpj'])
        Nao definidos
        @endempty
    @endisset
    <br>
    <br>
    @isset($fornecedores[2]['nome'])
    Fornecedor: {{$fornecedores[2]['nome']}}
    @endisset
    <br>
    @isset($fornecedores[2]['status'])
    Status:{{$fornecedores[2]['status']}}
    @endisset
    <br>
    @isset($fornecedores[2]['cnpj'])
    CNPJ:{{$fornecedores[2]['cnpj']}} 
        @empty($fornecedores[2]['cnpj'])
        Nao definidos
        @endempty
        <br>
      
    @endisset
    <br>
    <br>
    @isset($fornecedores[3]['nome'])
    Fornecedor: {{$fornecedores[3]['nome']}}
    @endisset
    <br>
    @isset($fornecedores[3]['status'])
    Status:{{$fornecedores[3]['status']}}
    @endisset
    <br>
    @isset($fornecedores[3]['cnpj'])
    CNPJ:{{$fornecedores[3]['cnpj'] ?? 'cnpj nao foi preenchido'}} {{-- nao funciona pois o @isset ja esta trabalhando --}}
        @empty($fornecedores[3]['cnpj'])
        Nao definidos
        @endempty
        <br>
    @endisset
    <br>
    <br>
@endisset

{{-- @empty - VERIFICA SE VARIAVEIS E ARRAYS ESTAO VAZIOS --}}
{{-- Consideramos variavel ou array vazia quando apresenta os seguintes valores:
- '' -> string vazia
- 0
- 0.0
- '0'
- null
- false
- array() -> array vazio
- $var -> variavel declarada mas nao alocado nenhum valor --

NESTAS SITUACAO O empty RETORNA TRUE --}}

