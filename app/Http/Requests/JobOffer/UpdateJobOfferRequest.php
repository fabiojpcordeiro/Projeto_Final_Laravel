<?php

namespace App\Http\Requests\JobOffer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobOfferRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_id'   => ['sometimes', 'exists:companies,id'],

            'title'        => ['sometimes', 'string', 'max:100'],
            'description'  => ['sometimes', 'string'],
            'city'         => ['sometimes', 'string', 'max:150'],
            'sector'       => ['sometimes', 'nullable', 'string', 'max:100'],
            'salary'       => ['sometimes', 'nullable', 'numeric'],

            'open_until'   => ['sometimes', 'date'],
            
            'is_temporary' => ['sometimes', 'boolean'],

            'dates'        => ['sometimes', 'array', 'min:1'],
            'dates.*'      => ['sometimes', 'date'],
        ];
    }
}
