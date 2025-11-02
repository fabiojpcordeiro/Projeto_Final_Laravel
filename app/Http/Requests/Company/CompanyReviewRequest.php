<?php

namespace App\Http\Requests\Company;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'rating' => 'required|integer|min:0|max:5',
            'company_id' =>
            [
                'required',
                Rule::unique('company_reviews')
                    ->where(
                        function ($query) {
                            return $query->where('user_id', Auth::id());
                        }
                    )
            ]
        ];
    }
}
