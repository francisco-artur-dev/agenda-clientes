<x-app-layout>

    <div class="container mx-auto px-4 my-3 d-flex justify-content-end gap-2">
        <a href="{{ route('cliente.index') }}" class="btn btn-secondary btn-sm">Voltar para Lista de Clientes</a>
    </div>
    
    <h1>Cadastro de Clientes</h1>
    <x-alert />


    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        @method('POST')

        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{old('nome')}}" placeholder="Nome completo">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="exemplo@gmail.com">
        </div>

        <div>
            <label for="data_nascimento">Data de nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="{{old('data_nascimento')}}">
        </div>
        <div>
            <label for="profissao">Profissão:</label>
            <input type="text" id="profissao" name="profissao" value="{{old('profissao')}}" placeholder="Profissão">
        </div>
        <div>
            <label for="genero">Gênero:</label>
            <select id="genero" name="genero">
                <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="feminino" {{ old('genero') == 'feminino' ? 'selected' : '' }}>Feminino</option>
                <option value="outro" {{ old('genero') == 'outro' ? 'selected' : '' }}>Outro</option>
            </select>
        </div>

        <div>
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone"  value="{{ old('telefone') }}" placeholder="(+244) 912 345 678">
        </div>

        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" value="{{ old('endereco') }}" placeholder="Endereço completo">
        </div>

        <button type="submit" class="btn btn-primary my-3 btn-sm">Cadastrar</button>
    </form>
</x-app-layout>
