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

Fornecedor:{{$fornecedores[0]['nome']}}
<br>
Status:{{$fornecedores[0]['status']}}
@if($fornecedores[0]['status'] === 'N')
    <p>Fornecedor inativo</p>

@endif
{{-- mas podemos usar o @unless para fazer a negacao como se fosse ! --}}

@unless($fornecedores[0]['status'] === 'S')
Fornecedor Inativo
@endunless
