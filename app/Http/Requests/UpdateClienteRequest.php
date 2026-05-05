<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // permite qualquer usuário por enquanto
    }

    public function rules(): array
    {
        // Route Model Binding pega o cliente da URL
        $id = $this->route('cliente')->id;

        return [
            'nome'  => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:clientes,email,' . $id,
            'data_nascimento' => 'required|date',
            'profissao' => 'nullable|string|max:255',
            'genero' => 'required|string|in:masculino,feminino,outro',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'required|string|max:255',
        ];
    }
}
