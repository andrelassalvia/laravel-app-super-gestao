@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
    
        <div class="titulo-pagina2">
            <p>Fornecedores - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                {{$msg ?? ''}}
                <form action={{route('app.fornecedor.adicionar')}} method="post">
                    <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">
                    @csrf
                    <input type="text" name="nome" placeholder='nome' value="{{$fornecedor->nome ?? old('nome')}}" class="borda-preta">
                        {{$errors->has('nome') ? $errors->first('nome') : ''}}
                    <input type="text" name="site" placeholder='site' class="borda-preta" value="{{$fornecedor->site ?? old('site')}}">
                        {{$errors->has('site') ? $errors->first('site') : ''}}
                    <input type="text" name="uf" class="borda-preta" placeholder='uf' value="{{$fornecedor->uf ?? old('uf')}}">
                        {{$errors->has('uf') ? $errors->first('uf') : ''}}
                    <input type="text" name="email" class="borda-preta" placeholder='email' value="{{$fornecedor->email ?? old('email')}}">
                        {{$errors->has('email') ? $errors->first('email') : ''}}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
 

 
@endsection