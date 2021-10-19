

{{-- logica para edição  --}}
@if(isset($cliente->id))
    <form action="{{ route('cliente.update', ['cliente' => $cliente->id])}}" method="post">
    @csrf
    @method('PUT')

{{-- logica para adição --}}
@else
    <form action="{{ route('cliente.store')}}" method="post">
    @csrf
@endif
    
        <input type="text" name="nome" placeholder='nome' value="{{$cliente->nome ?? old('nome')}}" class="borda-preta">
            {{$errors->has('nome') ? $errors->first('nome') : ''}}   
       
        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
            