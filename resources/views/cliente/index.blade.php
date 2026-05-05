<x-app-layout>
    <div class="container mx-auto px-4 my-3 d-flex justify-content-end gap-2">
        <a href="{{ route('cliente.cadastro') }}" class="btn btn-primary btn-sm">Cadastrar Novo Cliente</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Voltar para  o painel</a>
    </div>
     <x-alert /> 
      <h1>Lista de Clientes</h1>
   

    <table class="table">
        <thead>
            <tr>
                <th >ID</th>
                <th >Nome</th>
                <th >Email</th>
                <th >Data de Nascimento</th>
                <th >Telefone</th>
                <th >Endereço</th>
                <th >Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td class=" d-flex align-items-center gap-2">
                        <a href="{{ route('cliente.editar', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('cliente.show', $cliente->id) }}" class="btn btn-info btn-sm">Detalhes</a>
                        <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                             onclick="return confirm('Tem certeza que deseja deletar este cliente?');">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</x-app-layout>
