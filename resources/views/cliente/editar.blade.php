<x-app-layout>
    <div class="container mx-auto px-4 my-2 d-flex justify-content-end gap-2">
        <a href="{{ route('cliente.index') }}" class="btn btn-secondary btn-sm">Clientes</a>
        <a href="{{ route('cliente.show', $cliente->id) }}" class="btn btn-info btn-sm">Detalhes</a>
    </div>

    <x-alert />
    <h1>Editar Cliente</h1>

    <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Nome completo" value="{{ $cliente->nome }}">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="exemplo@gmail.com" value="{{ $cliente->email }}">
        </div>

        <div>
            <label for="data_nascimento">Data de nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ $cliente->data_nascimento }}"  >
        </div>

        <div>
            <label for="profissao">Profissão:</label>
            <input type="text" id="profissao" name="profissao" value="{{$cliente->profissao}}" placeholder="Profissão">
        </div>
        
        <div>
            <label for="genero">Gênero:</label>
            <select id="genero" name="genero">
                <option value="masculino" {{ $cliente->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="feminino" {{ $cliente->genero == 'feminino' ? 'selected' : '' }}>Feminino</option>
                <option value="outro" {{ $cliente->genero == 'outro' ? 'selected' : '' }}>Outro</option>
            </select>
        </div>

        <div>
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" placeholder="(+244) 912 345 678" value="{{ $cliente->telefone }}">
        </div>

        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" placeholder="Endereço completo" value="{{ $cliente->endereco }}">
        </div>

        <button type="submit" class="btn btn-warning my-3 btn-sm">Atualizar</button>
    </form>

</x-app-layout>
