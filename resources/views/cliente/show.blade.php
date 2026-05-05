<x-app-layout>
    <div class="container mx-auto px-4 my-3 d-flex justify-content-end gap-2">
        <a href="{{ route('cliente.index') }}" class="btn btn-info btn-sm">Clientes</a>
        <a href="{{ route('cliente.editar', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
        <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"
            onclick="return confirm('Tem certeza que deseja deletar este cliente?');">Deletar</button>
        </form>
    </div>
    <h1>Visualizar clientes</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Profissão</th>
            <th>Gênero</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Data de registro</th>
            <th>Data de atualização</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->data_nascimento ? \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') : '' }}</td>
            <td>{{ $cliente->profissao }}</td>
            <td>{{ $cliente->genero }}</td>
            <td>{{ $cliente->telefone }}</td>
            <td>{{ $cliente->endereco }}</td>
            <td>{{ optional($cliente->created_at)->format('d/m/Y H:i') }}</td>
            <td>{{ optional($cliente->updated_at)->format('d/m/Y H:i') }}</td>
        </tr>
    </tbody>
</table>
</x-app-layout>
