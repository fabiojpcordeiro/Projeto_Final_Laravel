<?php

namespace App\Http\Requests\Candidates;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:200',
            'email' => [
                'sometimes',
                'email',
                Rule::unique('candidates', 'email')->ignore($this->route('candidate'))
            ],
            'password' => 'sometimes|string|min:8|confirmed',
            'phone' => 'sometimes|string|max:100',
            'state_id' => 'sometimes|integer|exists:states,id',
            'city_id' => 'sometimes|integer|exists:cities,id',
            'bio' => 'sometimes|string|nullable',
            'profile_photo' => 'sometimes|nullable|string|max:200',
            'birthdate' => 'sometimes|date|nullable',
            'resume' => 'sometimes|file|mimes:pdf|max:5120'

        ];
    }
    public function messages()
    {
        return [
            'name.string' => 'O nome deve ser um texto válido.',
            'name.max' => 'O nome não pode ter mais que :max caracteres.',

            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está sendo utilizado por outro candidato.',

            'password.string' => 'A senha deve ser um texto válido.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',

            'phone.string' => 'O telefone deve ser um texto válido.',
            'phone.max' => 'O telefone não pode ter mais que :max caracteres.',

            'state_id.integer' => 'O estado deve ser um número inteiro válido.',
            'state_id.exists' => 'O estado selecionado não existe.',

            'city_id.integer' => 'A cidade deve ser um número inteiro válido.',
            'city_id.exists' => 'A cidade selecionada não existe.',

            'bio.string' => 'A biografia deve ser um texto válido.',

            'profile_photo.string' => 'A foto de perfil deve ser um texto válido.',
            'profile_photo.max' => 'O caminho da foto de perfil não pode ultrapassar :max caracteres.',

            'birthdate.date' => 'A data de nascimento deve ser uma data válida.',

            'resume.file' => 'O currículo deve ser um arquivo válido.',
            'resume.mimes' => 'O currículo deve estar no formato PDF.',
            'resume.max' => 'O currículo não pode ultrapassar :max kilobytes.',
        ];
    }
}
