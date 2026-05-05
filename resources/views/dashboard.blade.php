<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Painel de Controle
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Card de boas-vindas -->
            <div>
                <h2 class="text-2xl font-bold">
                    Olá, {{ auth()->user()?->name }}!
                </h2>

                <p class="text-gray-500">
                    Aqui está o resumo atualizado dos teus clientes.
                </p>
            </div>

            <!-- Cards de resumo -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-6 rounded-2xl shadow-lg">
                    <h4 class="text-sm opacity-80">Total de Clientes</h4>
                    <p class="text-3xl font-bold mt-2">{{ $totalClientes }}</p>
                </div>

                <div class="bg-gradient-to-r from-green-500 to-green-700 text-white p-6 rounded-2xl shadow-lg">
                    <h4 class="text-sm opacity-80">Aniversários Hoje</h4>
                    <p class="text-3xl font-bold mt-2">{{ $aniversariosHoje }}</p>
                </div>

                <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white p-6 rounded-2xl shadow-lg">
                    <h4 class="text-sm opacity-80">Próximos 7 dias</h4>
                    <p class="text-3xl font-bold mt-2">{{ $proximos7Dias }}</p>
                </div>

            </div>

            <!-- Lista de aniversariantes -->
            <div class="mt-8 bg-white p-6 rounded-2xl shadow-lg">
                <h3 class="text-xl font-bold mb-4">Próximos Aniversariantes</h3>

                @if($proximos->isNotEmpty())
                    <div class="space-y-3">

                @foreach($proximos as $cliente)

                    <div class="flex justify-between items-center p-4 rounded-lg 
                        {{ $cliente->dias_restantes == 0 
                            ? 'bg-green-100 border-l-4 border-green-500 shadow' 
                            : 'bg-gray-50' }}">

                        <div>
                            <p class="font-semibold">{{ $cliente->nome }}</p>
                            <p class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m') }}
                            </p>
                        </div>

                        <a href="{{ route('cliente.show', $cliente->id) }}"
                        class="text-sm bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            Ver
                        </a>

                    </div>
                @endforeach

                    </div>
                @else
                    <p class="text-gray-500">Nenhum aniversário nos próximos 7 dias</p>
                @endif
            </div>

            <!-- Ações rápidas -->
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <h4 class="font-semibold mb-4">Ações rápidas</h4>

                <div class="flex gap-4">
                    <a href="{{ route('cliente.cadastro') }}" 
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Adicionar Cliente
                    </a>

                    <a href="{{ route('cliente.index') }}" 
                       class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
                        Ver Lista de Clientes
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>