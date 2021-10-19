


    <form action="{{ route('pedido_produto.store', ['pedido' => $pedido])}}" method="post">
    @csrf

        
        <select name="produto_id">
            <option>--Selecione um Produto--</option>
            @foreach ($produtos as $produto)
            
                <option value="{{$produto->id}}">{{$produto->nome}}</option>
            @endforeach
            
        </select>   
        {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}
        
        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
            