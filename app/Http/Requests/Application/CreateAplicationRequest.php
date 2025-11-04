<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class CreateAplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'resume' => 'nullable|file|mimes:pdf|max:5120',
            'message' => 'nullable|string|max:1000',
            'job_offer_id' =>'required|exists:job_offers,id',
        ];
    }

    public function messages(){
        return ['*' => 'Ocorreu um erro de validação'];
    }
}
