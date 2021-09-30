{{$slot}}

<form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
    <br>
    <select name="motivo_contato"  class="{{$classe}}"> <!-- No caso do SELECT o old() é tratado de forma diferente -->
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
        <option value="{{$key}}" {{old('motivo_contato') == $key ? 'selected' : ''}}>{{$motivo_contato}}
        
            
        </option>
        @endforeach
        {{-- <option value="2" {{old('motivo_contato') == 2 ? 'selected' : ''}}>Elogio</option>
        <option value="3" {{old('motivo_contato') == 3 ? 'selected' : ''}}>Reclamação</option> --}}
    </select>
    <br>
    <textarea name="mensagem" value="{{old('mensagem')}}" class="{{$classe}}"> {{(old('mensagem') != '') ? old('mensagem') : 'Preencha aqui sua mensagem'}}</textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>
