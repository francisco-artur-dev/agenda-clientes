<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use Illuminate\View\View;



class UserController extends Controller
{

    public function create(): View
    {

        // Retorna a view de cadastro de cliente
        return view('cliente.cadastro');
    }

    public function store(Request $request)
    {
        
        //validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:clientes,email',
            'data_nascimento' => 'required|date',
            'profissao' => 'nullable|string|max:255',
            'genero' => 'required|string|in:masculino,feminino,outro',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'required|string|max:255',
        ]);
        // Criação do usuário (cliente) no banco de dados
        Cliente::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'profissao' => $request->profissao,
            'genero' => $request->genero,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
        ]);
        // Redireciona para a lista de clientes com uma mensagem de sucesso
        return redirect()->route('cliente.index') ->with('success', 'Cliente cadastrado com sucesso!');
    }

    // lista todos os clientes
    public function index(): View
    {
          // lógica para listar clientes

        // $clientes = Cliente::all();
        $clientes = Cliente::orderBy('nome', 'asc')->get();
        return view('cliente.index', compact('clientes'));
    }

    public function show(Cliente $cliente): View
    {
        return view('cliente.show', compact('cliente'));
    }


    // edita um cliente
    public function edit(Cliente $cliente): View
    {
        // lógica para editar cliente
        return view('cliente.editar', compact('cliente'));
    }

    // atualiza um cliente
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        // $request->validated() já retorna só os dados validados
        $cliente->update($request->validated());

        return redirect()
            ->route('cliente.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    // elimina um cliente
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()
            ->route('cliente.index')
            ->with('success', 'Cliente excluído com sucesso!');
    }

}




