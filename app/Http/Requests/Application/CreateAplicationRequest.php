<?php

namespace App\Http\Requests\Application;

use App\Models\Application;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateAplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'message' => 'nullable|string|max:1000',
            'job_offer_id' => 'required|exists:job_offers,id',
        ];
    }

    public function messages()
    {
        return ['*' => 'Ocorreu um erro de validação'];
    }
    public function withValidator($validator)
    {
        $validator->after(
            function ($validator) {
                $candidate_id = auth()->user()->id;
                $jobOfferId = $this->input('job_offer_id');
                $alreadyApplied = Application::where('candidate_id', $candidate_id)
                    ->where('job_offer_id', $jobOfferId)
                    ->exists();

                if ($alreadyApplied) {
                    $validator->errors()->add(
                        'job_offer_id',
                        'Você já se candidatou a esta vaga.'
                    );
                }
            }
        );
    }
    protected function failedValidation(ValidationValidator $validator)
        {
            $errors =$validator->errors()->all();
            $messages = count($errors) > 1 ? implode(' ', $errors) : $errors[0];
            throw new HttpResponseException(
                response()->json(['message'=>$messages], 422)
            );
        }

}
