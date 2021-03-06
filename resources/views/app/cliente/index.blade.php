@extends('app.layouts.basico')

@section('titulo', 'Clientes')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina2">
            <p>Listagem de Clientes</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('cliente.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto">
                <table border="1" width="100%">
                
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->nome}}</td>
                                
                                <td><a href="{{route('cliente.show', ['cliente' => $cliente->id])}}">Visualizar</a></td>
                                <td>
                                <form id="form_{{$cliente->id}}" method="post" action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}">
                                    @method('DELETE')
                                    @csrf
                                <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a></td>
                                <!-- <button type="submit">Excluir</button> -->
                                </form>
                                <td><a href="{{route('cliente.edit', ['cliente' => $cliente->id])}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               
                {{$clientes->appends($request)->links()}}
                <br>
                {{$clientes->count()}} - total de registros por pagina
                <br>
                {{$clientes->total()}} - total de registros
                <br>
                {{$clientes->firstItem()}} - n??mero do primeiro registro da p??gina
                <br>
                {{$clientes->lastItem()}} - numero do ultimo registro da pagina
            </div>
        </div>
    </div>
 

 
@endsection