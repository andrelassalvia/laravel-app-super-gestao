

{{-- logica para edição  --}}
@if(isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id])}}" method="post">
    @csrf
    @method('PUT')

{{-- logica para adição --}}
@else
    <form action="{{ route('produto-detalhe.store')}}" method="post">
    @csrf
@endif


        <input type="text" name="produto_id" placeholder='ID do Produto' value="{{$produto_detalhe->produto_id ?? old('produto_id')}}" class="borda-preta">
            {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}   

        <input type="text" name="comprimento" placeholder='Comprimento do Produto' class="borda-preta" value="{{$produto_detalhe->comprimento ?? old('comprimento')}}">
            {{$errors->has('comprimento') ? $errors->first('comprimento') : ''}}

        <input type="text" name="largura" class="borda-preta" placeholder='Largura do Produto' value="{{$produto_detalhe->largura ?? old('largura')}}">
            {{$errors->has('largura') ? $errors->first('largura') : ''}}

        <input type="text" name="altura" class="borda-preta" placeholder='Altura do Produto' value="{{$produto_detalhe->altura ?? old('altura')}}">
            {{$errors->has('altura') ? $errors->first('altura') : ''}}

        <select name="unidade_id">
            <option> -- Selecione a Unidade de Medida --</option>
            @foreach ($unidades as $unidade)
                <option value="{{$unidade->id}}" {{($produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' )}}>{{$unidade->descricao}}</option>
             @endforeach
        </select>  
            {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
            