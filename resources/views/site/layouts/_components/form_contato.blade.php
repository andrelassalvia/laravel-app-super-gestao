{{$slot}}

<form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
    <br>
        @if($errors->has('nome')) {{$errors->first('nome')}} {{--colocar mensagem de erro na tela. --}} {{--$errors->has() ha algum erro no input name?--}} {{-- $errors->first() busque a primeira validacao em que retorne verdadeiro para erro --}}
        @endif

    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
    <br>
        {{$errors->has('telefone') ? $errors->first('telefone') : ''}}

    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
    <br>
        {{$errors->has('email') ? $errors->first('email') : ''}}

    <select name="motivo_contatos_id"  class="{{$classe}}"> <!-- No caso do SELECT o old() é tratado de forma diferente -->
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}
            </option>
        @endforeach
        {{-- <option value="2" {{old('motivo_contato') == 2 ? 'selected' : ''}}>Elogio</option>
        <option value="3" {{old('motivo_contato') == 3 ? 'selected' : ''}}>Reclamação</option> --}}
    </select>
    <br>
        {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}

    <textarea name="mensagem" value="{{old('mensagem')}}" class="{{$classe}}"> {{(old('mensagem') != '') ? old('mensagem') : 'Preencha aqui sua mensagem'}}</textarea>
    <br>
        {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}

    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>



@if($errors->any()) {{--any() se houver qualquer erro--}}
    <div style="position:absolute; top:0px; left:0px; width:100%; background-color:blue; color:white">
        @foreach ($errors->all() as $erro)
            {{$erro}}
            <br>
        
            
        @endforeach
    </div>

@endif
