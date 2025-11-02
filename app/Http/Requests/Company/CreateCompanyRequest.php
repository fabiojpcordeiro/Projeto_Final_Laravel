<?php

namespace App\Http\Requests\Company;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = Auth::user();
        if(!$user){
            return false;
        }
        return $user->company_id === null || $user->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:100|unique:companies,name',
            'public_email' => 'required|max:100|unique:companies,public_email',
            'state' => 'required|string|size:2',
            'city' => 'required|string|min:2|max:150',
            'street'=> 'required|string|max:100',
            'number' => 'required|string|max:8',
            'sector' => 'nullable|string|min:2|max:100',
            'about' => 'nullable|string|max:3000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]; 
    }
    public function messages(): array
    {
        return [
            'name.required' => 'O nome da empresa é obrigatório.',
            'name.unique' => 'Já existe uma empresa com este nome.',
            'name.min' => 'O nome deve ter no mínimo :min caracteres.',
            'name.max' => 'O nome deve ter no máximo :max caracteres.',

            'public_email.required' => 'O email público é obrigatório.',
            'public_email.email' => 'O email informado não é válido.',
            'public_email.unique' => 'Este email já está cadastrado.',
            'public_email.max' => 'O email deve ter no máximo :max caracteres.',

            'state.size' => 'O estado deve ter exatamente :size caracteres.',

            'city.required' => 'A cidade é obrigatória.',
            'city.min' => 'A cidade deve ter no mínimo :min caracteres.',
            'city.max' => 'A cidade deve ter no máximo :max caracteres.',

            'street.required' => 'O campo Rua é obrigatório.',
            'street.string' => 'O campo Rua deve ser um texto válido.',
            'street.max' => 'O campo Rua não pode ter mais de :max caracteres.',

            'number.required' => 'O campo Número é obrigatório.',
            'number.string' => 'O campo Número deve ser um texto válido.',
            'number.max' => 'O campo Número não pode ter mais de :max caracteres.',

            'sector.min' => 'O setor deve ter no mínimo :min caracteres.',
            'sector.max' => 'O setor deve ter no máximo :max caracteres.',

            'about'=> 'nullable|string|',

            'logo.image' => 'O arquivo do Logo deve ser uma imagem.',
            'logo.mimes' => 'O Logo deve ser do tipo: jpeg, png, jpg, gif ou webp.',
            'logo.max' => 'O Logo não pode ter mais de :max.'
        ];
    }
}
