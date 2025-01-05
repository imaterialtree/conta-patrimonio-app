<?php

namespace App\Http\Requests;

use App\Models\Usuario;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->tipo == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $usuarioId = $this->usuario?->id;

        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(Usuario::class)->ignore($usuarioId)],
            'senha' => ['confirmed', Rules\Password::defaults()],
            'siape' => ['required', 'numeric', Rule::unique(Usuario::class)->ignore($usuarioId)],
            'tipo' => ['required', Rule::in(['admin', 'comissao'])],
        ];
    }

    public function messages(): array
    {
        return [
            'unique' => 'O :attribute já está em uso por um usuário',
        ];
    }
}
