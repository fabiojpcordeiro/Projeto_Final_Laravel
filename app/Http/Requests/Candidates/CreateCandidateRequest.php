<?php

namespace App\Http\Requests\Candidates;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use PhpParser\Node\Expr\Throw_;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CreateCandidateRequest extends FormRequest
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
            'name' => 'required|string|max:200',
            'email' => 'required|email|unique:candidates,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:100',
            'state_id' => 'required|integer|exists:states,id',
            'city_id' => 'required|integer|exists:cities,id',
            'bio' => 'nullable|string',
            'profile_photo' => 'nullable|string|max:200',
            'birthdate' => 'nullable|date',
            'resume' => 'nullable|file|mimes:pdf|max:5120'
        ];
    }
    public function messages()
    {
        return [
            // 'name'
            'name.required' => 'O campo Nome é obrigatório.',
            'name.string' => 'O campo Nome deve ser uma sequência de caracteres (texto).',
            'name.max' => 'O campo Nome não pode ter mais que 200 caracteres.',

            // 'email'
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O E-mail inserido não é válido.',
            'email.unique' => 'Este E-mail já está cadastrado em nosso sistema.',

            // 'password'
            'password.required' => 'O campo Senha é obrigatório.',
            'password.string' => 'O campo Senha deve ser uma sequência de caracteres (texto).',
            'password.min' => 'A Senha deve ter no mínimo 8 caracteres.',
            'password.confirmed' => 'A confirmação da Senha não coincide com a senha digitada.',

            // 'phone'
            'phone.required' => 'O campo Telefone é obrigatório.',
            'phone.string' => 'O campo Telefone deve ser uma sequência de caracteres (texto).',
            'phone.max' => 'O campo Telefone não pode ter mais que 100 caracteres.',

            // 'state_id'
            'state_id.required' => 'O campo Estado é obrigatório.',
            'state_id.integer' => 'O campo Estado deve ser um número inteiro.',
            'state_id.exists' => 'O Estado selecionado não é válido.',

            // 'city_id'
            'city_id.required' => 'O campo Cidade é obrigatório.',
            'city_id.integer' => 'O campo Cidade deve ser um número inteiro.',
            'city_id.exists' => 'A Cidade selecionada não é válida.',

            // 'bio'
            'bio.string' => 'O campo Biografia deve ser uma sequência de caracteres (texto).',

            // 'profile_photo'
            'profile_photo.string' => 'O campo Foto de Perfil deve ser uma sequência de caracteres (texto) ou o caminho para o arquivo.',
            'profile_photo.max' => 'O campo Foto de Perfil não pode ter mais que 200 caracteres.',

            // 'birthdate'
            'birthdate.date' => 'O campo Data de Nascimento não contém uma data válida.',

            // 'resume'
            'resume.file' => 'O campo Currículo deve ser um arquivo.',
            'resume.mimes' => 'O Currículo deve ser um arquivo do tipo PDF.',
            'resume.max' => 'O Currículo não pode ter mais que 5MB (5120 KB).'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'message' => 'Erro de validação',
                    'errors' => $validator->errors()
                ],
                422
            )
        );
    }
}
