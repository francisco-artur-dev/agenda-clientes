@component('mail::message')
 📅 Lembrete de Aniversários

Olá Admin,  
Aqui estão os aniversários próximos dos seus clientes:

@foreach($clientes as $dia => $grupo)

 📌 {{ ucfirst($dia) }}

@foreach($grupo as $cliente)

- «{{ $cliente->nome }}» ({{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m') }})

@endforeach

@endforeach

@component('mail::button', ['url' => route('cliente.index')])
Ver Lista de Clientes
@endcomponent

{{ config('app.name') }}
@endcomponent