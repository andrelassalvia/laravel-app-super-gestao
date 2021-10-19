@extends('app.layouts.basico')

@section('titulo', 'Pedido-Produto')

@section('conteudo')

    <div class="conteudo-pagina">
    
        <div class="titulo-pagina2">
                <p>Adicionar produtos ao pedido</p>
 
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('pedido.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
        <h4>Detalhes do Pedido</h4>
        
            <p>Id do pedido: {{$pedido->id}}</p>
            <p>Id do cliente: {{$pedido->cliente_id}}</p>
            {{-- {{$pedido->toJson()}} --}}
            {{-- <p>Cliente: {{$pedido->cliente_id}}</p>     --}}
      
        
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <h4>Produtos do Pedido</h4>
               {{$pedido}}
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>
    </div>

@endsection