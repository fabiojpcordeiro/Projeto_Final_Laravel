<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApplicationRequest extends FormRequest
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
            'job_offer_id' => [
                'required',
                'exists:job_offers,id',
                Rule::unique('candidate_job', 'job_offer_id')
                    ->ignore($this->route('application')->id)
                    ->where(function ($query) {
                        $query->where('candidate_id', $this->user()->id);
                    })
            ],
        ];
    }

    public function messages()
    {
        return [
            'job_offer_id.required' => 'job_offer necessário',
            'job_offer_id.exists'   => 'job_offer não existe',
            'job_offer_id.unique'   => 'Você já se candidatou a essa vaga'
        ];
    }
}
