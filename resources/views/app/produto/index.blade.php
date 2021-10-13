@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina2">
            <p>Listagem de Produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade Id</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <th>{{$produto->nome}}</th>
                                <th>{{$produto->descricao}}</th>
                                <th>{{$produto->peso}}</th>
                                <th>{{$produto->unidade_id}}</th>
                                <th><a href="{{route('produto.show', ['produto' => $produto->id])}}">Visualizar</a></th>
                                <th><a href="">Excluir</a></th>
                                <th><a href="">Editar</a></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$produtos->appends($request)->links()}}
                <br>
                {{$produtos->count()}} - total de registros por pagina
                <br>
                {{$produtos->total()}} - total de registros
                <br>
                {{$produtos->firstItem()}} - número do primeiro registro da página
                <br>
                {{$produtos->lastItem()}} - numero do ultimo registro da pagina
            </div>
        </div>
    </div>
 

 
@endsection