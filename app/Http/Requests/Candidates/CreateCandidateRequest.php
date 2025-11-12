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
            '*' => 'Ocorreu um erro de validação',
            'city.required' => 'A cidade é obrigatória',
            'city.integer' => 'formato inválido',
            'city.exists' => 'a cidade não foi encontrada',
            'password.confirmed' => 'As senhas não são iguais'
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
