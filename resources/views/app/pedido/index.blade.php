@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina2">
            <p>Listagem de Pedidos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('pedido.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto">
                <table border="1" width="100%">
                
                    <thead>
                        <tr>
                            <th>Id Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($pedidos as $pedido)
                        
                            <tr>
                                <td>{{$pedido->id}}</td>
                                <td>{{$pedido->cliente->nome}}</td>
                                <td><a href="{{route('pedido_produto.create', ['pedido' => $pedido->id])}}">Adicionar Produtos</a></td>
                                <td><a href="{{route('pedido.show', ['pedido' => $pedido->id])}}">Visualizar</a></td>
                                <td>
                                <form id="form_{{$pedido->id}}" method="post" action="{{route('pedido.destroy', ['pedido' => $pedido->id])}}">
                                    @method('DELETE')
                                    @csrf
                                <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a></td>
                                <!-- <button type="submit">Excluir</button> -->
                                </form>
                                <td><a href="{{route('pedido.edit', ['pedido' => $pedido->id])}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               
                {{$pedidos->appends($request)->links()}}
                <br>
                {{$pedidos->count()}} - total de registros por pagina
                <br>
                {{$pedidos->total()}} - total de registros
                <br>
                {{$pedidos->firstItem()}} - número do primeiro registro da página
                <br>
                {{$pedidos->lastItem()}} - numero do ultimo registro da pagina
            </div>
        </div>
    </div>

@endsection