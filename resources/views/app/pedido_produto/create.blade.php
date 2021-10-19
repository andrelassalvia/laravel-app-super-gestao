@extends('app.layouts.basico')

@php
$titulo = 'Adicionar Produto a Pedido';
@endphp

@section('titulo', $titulo)

@section('conteudo')

    <div class="conteudo-pagina">
    
        <div class="titulo-pagina2">
                <p>{{$titulo}}</p>
 
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
            <p>Nome do cliente: {{$pedido->cliente->nome}}</p>
           
            {{-- <p>Cliente: {{$pedido->cliente_id}}</p>     --}}
      
        
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <h4>Produtos do Pedido</h4>
                <table border="1px" width="100%">
                    <thead>
                        <tr>
                            <th>Id Produto</th>
                            <th>Nome do produto</th>
                            <th>Data de Inclusão do Item no Pedido</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ( $pedido->produtos as $produto )
                            <tr>
                                <td>{{$produto->id}}</td>
                                <td>{{$produto->nome}}</td>
                                {{-- <td>{{date('d-m-Y H:i:s', strtotime($produto->pivot->created_at))}}</td> --}}
                                <td>{{$produto->pivot->created_at->format('d-m-Y H:i')}}</td>
                                <td>
                                    <form id="form_{{$produto->pivot->id}}" method="post" action="{{route('pedido_produto.destroy', ['pedidoProduto' => $produto->pivot->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               
                <hr>
                
             
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>
    </div>

@endsection