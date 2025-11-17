<?php

namespace App\Http\Requests\Candidates;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassworRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'old_password' => 'required|current_password',
            'new_password' => 'required|string|min:8|confirmed'
        ];
    }
     public function messages(): array
    {
        return [
            'old_password.current_password' => 'A senha antiga está incorreta.',
            'new_password.confirmed' => 'A confirmação da nova senha não confere.',
            'new_password.min' => 'A nova senha deve ter no mínimo 6 caracteres.',
        ];
    }
}
