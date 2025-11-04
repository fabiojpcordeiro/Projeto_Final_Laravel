<?php

namespace App\Http\Requests\Candidates;

use Illuminate\Foundation\Http\FormRequest;

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
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:100',
            'state' => 'nullable|string|size:2',
            'city' => 'nullable|string|max:150',
            'bio' => 'nullable|string',
            'profile_photo' => 'nullable|string|max:200',
            'birthdate' => 'nullable|date',
        ];
    }
    public function messages()
    {
        return ['*' => 'Ocorreu um erro de validação'];
    }
}
