<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = auth('sanctum')->user();
        return $user && $user->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'name' => [
                'sometimes',
                'string',
                'min:2',
                'max:100',
                Rule::unique('companies', 'name')->ignore($this->company)
            ],
            'public_email' => [
                'sometimes',
                'email:rfc,dns',
                'max:100',
                Rule::unique('companies', 'public_email')->ignore($this->company)
            ],
            'state' => 'sometimes|string|size:2',
            'city' => 'sometimes|string|min:2|max:150',
            'street'=> 'sometimes|string|max:100',
            'number' => 'sometimes|string|max:8',
            'sector' => 'nullable|string|min:2|max:100',
            'about' => 'nullable|string'
        ];
    }
    public function messages(): array
    {
        return [
            'name.min' => 'O nome deve ter no mínimo :min caracteres.',
            'name.max' => 'O nome deve ter no máximo :max caracteres.',

            'public_email.email' => 'O email informado não é válido.',
            'public_email.max' => 'O email deve ter no máximo :max caracteres.',

            'state.size' => 'O estado deve ter exatamente :size caracteres.',

            'city.min' => 'A cidade deve ter no mínimo :min caracteres.',
            'city.max' => 'A cidade deve ter no máximo :max caracteres.',

            'street.string' => 'O campo Rua deve ser um texto válido.',
            'street.max' => 'O campo Rua não pode ter mais de :max caracteres.',

            'number.string' => 'O campo Número deve ser um texto válido.',
            'number.max' => 'O campo Número não pode ter mais de 8 caracteres.',

            'sector.min' => 'O setor deve ter no mínimo :min caracteres.',
            'sector.max' => 'O setor deve ter no máximo :max caracteres.'
        ];
    }
}
