<?php

namespace App\Http\Requests\JobOffer;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateJobOfferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_id'   => ['required', 'exists:companies,id'],
            'title'        => ['required', 'string', 'max:100'],
            'description'  => ['required', 'string'],
            'city'         => ['required', 'string', 'max:150'],
            'sector'       => ['nullable', 'string', 'max:100'],
            'salary'       => ['nullable', 'numeric'],
            'open_until'   => ['required', 'date'],
            'is_temporary' => ['required', 'boolean'],
            'dates'        => ['required', 'array', 'min:1'],
            'dates.*'      => ['required', 'date'],
        ];
    }
}
