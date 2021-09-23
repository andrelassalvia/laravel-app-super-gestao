<h3>Fornecedor</h3>

{{-- aqui dentro fica o comentario que nao sera interpretado. --}}

{{-- ========================================================= --}}

{{-- Secao pura de PHP dentro do Blade --}}
@php
 // para fazermos uma secao pura de php basta iniciarmos e fecharmos uma secao com @

 // echo 'texto de teste';

/*
 if (){

 } elseif (){

 } else*/

@endphp

{{-- =============================================================== --}}

{{-- para usar um array vindo de uma variavel no laravel  --}}
{{-- @dd($fornecedores) --}}

{{-- ============================================================== --}}
{{-- IF ELSE NO LARAVEL --}}

{{-- @if(count($fornecedores) > 0 && count($fornecedores) < 10){
    <h3>Existem alguns fornecedores cadastrados</h3>
} @elseif(count($fornecedores) > 10){
    <h3>Existem muitos fornecedores cadastrados</h3>
}@else{
    <h3>Nao existem fornecedores cadastrados.</h3>
}
@endif --}}

{{-- ================================================================= --}}
{{-- UNLESS -> O INVERSO DO IF --}}

{{-- @unless é uma inversao de @if --}}

{{-- @dd($fornecedores) --}}

{{-- @if($fornecedores[0]['status'] === 'N')
    <p>Fornecedor inativo</p>

@endif --}}
{{-- mas podemos usar o @unless para fazer a negacao como se fosse ! --}}

{{-- @unless($fornecedores[0]['status'] === 'S')
Fornecedor Inativo
@endunless --}}


{{-- ======================================================================= --}}
{{-- ISSET -> EXISTE A VARIAVEL OU ARRAY? --}}
{{-- @isset - verificar se variaveis, arrays estao definidos. Retorna True or False --}}



{{-- EMPTY -> A VARIAVEL EXISTE, MAS ELA POSSUI ALGUM VALOR? --}}
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

{{-- @isset($fornecedores)
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
    @isset($fornecedores[3]['cnpj']) --}}
    {{-- CNPJ:{{$fornecedores[3]['cnpj'] ?? 'cnpj nao foi preenchido'}} nao funciona pois o @isset ja esta trabalhando --}}
        {{-- @empty($fornecedores[3]['cnpj'])
        Nao definidos
        @endempty
        <br>
    @endisset
    <br>
    <br>
@endisset --}}




{{-- ======================================================= --}}
{{-- OPERADOR TERNARIO ?? --}}

{{-- SWITCH CASE NO BLADE --}}
{{-- @isset($fornecedores)
    Fornecedor: {{$fornecedores[3]['nome']}}
    <br>
    Status: {{$fornecedores[3]['status']}}
    <br>
    CNPJ: {{$fornecedores[3]['cnpj'] ?? 'cnpj nao informado'}}
    <br>
    DDD: {{$fornecedores[3]['DDD'] ?? 'DDD nao informado'}}
    Telefone: {{$fornecedores[3]['telefone'] ?? 'Telefone nao informado'}}

    @switch($fornecedores[3]['DDD'])
        @case('11')
            Sao Paulo - SP
        @break
        @case('85')
            Fortaleza - CE
        @break
        @case('32')
            Juiz de Fora - MG
        @break
        @default
         
        @break

    @endswitch

@endisset --}}


{{-- ======================================================== --}}
{{-- FOR NO BLADE --}}

{{-- @isset($fornecedores)

    
    @for ($i = 0;  isset($fornecedores[$i]) ; $i++)

        Fornecedor: {{$fornecedores[$i]['nome'] ?? 'Não existe este fornecedor'}}
        <br>
        Status: {{$fornecedores[$i]['status'] ?? 'Status não identificado'}}
        <br>
        CNPJ: {{$fornecedores[$i]['cnpj'] ?? 'não informado'}}
        <br>
        DDD: {{$fornecedores[$i]['DDD'] ?? 'DDD não informado'}}
        Telefone: {{$fornecedores[$i]['telefone'] ?? 'não informado'}}

        @switch($fornecedores[$i]['DDD'])

            @case('11')
                São Paulo - SP
            @break
            @case('85')
                Fortaleza - CE
            @break
            @case('32')
                Juiz de Fora - MG
            @break
            @default
            @break

        @endswitch
        <br>
        <hr>
        <br>

    @endfor

@endisset --}}

{{-- ============================================================ --}}
{{-- WHILE NO BLADE --}}

{{-- @isset($fornecedores)

    @php $i = 0 @endphp
    @while(isset($fornecedores[$i]))
        Fornecedor: {{$fornecedores[$i]['nome'] ?? 'Não existe este fornecedor'}}
        <br>
        Status: {{$fornecedores[$i]['status'] ?? 'Status não identificado'}}
        <br>
        CNPJ: {{$fornecedores[$i]['cnpj'] ?? 'não informado'}}
        <br>
        DDD: {{$fornecedores[$i]['DDD'] ?? 'DDD não informado'}}
        Telefone: {{$fornecedores[$i]['telefone'] ?? 'não informado'}}

        @switch($fornecedores[$i]['DDD'])

            @case('11')
                São Paulo - SP
                @break
            @case('85')
                Fortaleza - CE
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @default
                @break

        @endswitch
        @php $i++ @endphp
        <br>
        <hr>
        <br>
    @endwhile
@endisset --}}


{{-- ============================================================ --}}
{{-- FOREACH NO BLADE --}}

{{-- @isset($fornecedores)

    @foreach ($fornecedores as $indice => $fornecedor )
        
        Fornecedor: {{$fornecedor['nome'] ?? 'Não existe este fornecedor'}}
        <br>
        Status: {{$fornecedor['status'] ?? 'Status não identificado'}}
        <br>
        CNPJ: {{$fornecedor['cnpj'] ?? 'não informado'}}
        <br>
        DDD: {{$fornecedor['DDD'] ?? 'DDD não informado'}}
        Telefone: {{$fornecedor['telefone'] ?? 'não informado'}}

        @switch($fornecedor['DDD'])

            @case('11')
                São Paulo - SP
                @break
            @case('85')
                Fortaleza - CE
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @default
                @break

        @endswitch
        <hr>
    @endforeach

@endisset --}}

{{-- ============================================================ --}}
{{-- FORELSE NO BLADE --}}
{{-- ForElse nao existe no PHP nativo --}}
{{-- Funciona como uma combinacao entre um FOREACH e um bloco condicional para verificar se o array esta ou nao vazio --}}
{{-- Se houver itens a ser percorridos no array, entao o bloco de repeticao sera executado. Caso contrario o fluxo é desviado --}}

{{-- @isset($fornecedores)

    @forelse($fornecedores as $indice => $fornecedor)
        Fornecedor: {{$fornecedor['nome'] ?? 'não informado'}}
        <br>
        Status: {{$fornecedor['status'] ?? 'não informado'}}
        <br>
        CNPJ: {{$fornecedor['cnpj'] ?? ' não informado'}}
        <br>
        DDD: {{$fornecedor['DDD'] ?? 'não informado'}}
        Telefone: {{$fornecedor['telefone'] ?? 'não informado'}}

        @switch($fornecedor['DDD'])
            @case('11')
                Sao Paulo - SP
                @break
            @case('85')
                Fortaleza - CE
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @default

                @break
        @endswitch
        <hr> --}}

    {{-- @empty Caso nao haja valores no array o fluxo sera desviado para ca --}}
        {{-- Nenhum fornecedor cadastrado!!!
    @endforelse

@endisset --}}


{{-- ============================================================ --}}
{{-- ESCAPANDO À SINTAXE DE IMPRESSÃO NO BLADE --}}
{{-- Pode ser que precisemos utilizar chaves duplas -> {{}} mas nao para imprimir strings ou variaveis --}}
{{-- Quando colocamos @ antes das chaves duplas o que vem escrito a seguir é interpretado como string  --}}

{{-- @isset($fornecedores)

    @forelse($fornecedores as $indice => $fornecedor)
        Fornecedor: @{{$fornecedor['nome'] ?? 'não informado'}}
        <br>
        Status: @{{$fornecedor['status'] ?? 'não informado'}}
        <br>
        CNPJ: @{{$fornecedor['cnpj'] ?? ' não informado'}}
        <br>
        DDD: @{{$fornecedor['DDD'] ?? 'não informado'}}
        Telefone: @{{$fornecedor['telefone'] ?? 'não informado'}}

        @switch($fornecedor['DDD'])
            @case('11')
                Sao Paulo - SP
                @break
            @case('85')
                Fortaleza - CE
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @default

                @break
        @endswitch
        <hr> 

    @empty 
        Nenhum fornecedor cadastrado!!!
    @endforelse

@endisset --}}

{{-- ============================================================ --}}
{{--  VARIAVEL LOOP --}}
{{-- Loop é um objeto criado automaticamente pelo BLADE quando estamos trabalhando com os laços FOREACH e FORELSE --}}
{{-- O Loop fornece informações sobre o que está acontecendo no laço --}}

@isset($fornecedores)

    @forelse($fornecedores as $indice => $fornecedor)

        @dd($loop) {{--Para enxergarmos todos os atributos do objeto LOOP--}}
        Iteração Atual {{$loop->iteration}} {{--Fornece a informação de qual iteração está sendo executada no momento--}}
        <br>
        Fornecedor: {{$fornecedor['nome'] ?? 'não informado'}}
        <br>
        Status: {{$fornecedor['status'] ?? 'não informado'}}
        <br>
        CNPJ: {{$fornecedor['cnpj'] ?? ' não informado'}}
        <br>
        DDD: {{$fornecedor['DDD'] ?? 'não informado'}}
        Telefone: {{$fornecedor['telefone'] ?? 'não informado'}}

        @switch($fornecedor['DDD'])
            @case('11')
                Sao Paulo - SP
                @break
            @case('85')
                Fortaleza - CE
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @default

                @break
        @endswitch
        <br>
        @if($loop->first)
            Primeira iteração do LOOP.
        @endif
        @if($loop->last)
            Ultima iteração do LOOP.
            <br>
            <br>
            Total de Registros: {{$loop->count}}
        @endif
        <br>
        
        <hr> 
    @empty 
        Nenhum fornecedor cadastrado!!!
    @endforelse
    

@endisset