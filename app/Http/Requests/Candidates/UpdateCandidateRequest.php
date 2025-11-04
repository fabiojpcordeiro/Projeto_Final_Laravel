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
            'email' => ['sometimes', 'email',
            Rule::unique('candidates', 'email')->ignore($this->route('candidate'))],
            'phone' => 'sometimes|string|max:100',
            'state' => 'sometimes|string|size:2',
            'city' => 'sometimes|string|max:150',
            'bio' => 'sometimes|string',
            'profile_photo' => 'sometimes|nullable|string|max:200',
            'birthdate' => 'sometimes|date',
            
        ];
    }
    public function messages()
    {
        return ['*'=>'Ocorreu um erro de validação'];
    }
}
