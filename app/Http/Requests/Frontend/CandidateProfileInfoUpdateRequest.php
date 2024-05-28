<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateProfileInfoUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'gender' => ['required', 'in:male,female,other'],
            'marital_status' => ['required', 'in:married,single'],
            'skill' => ['required'],
            'language' => ['required'],
            'profession' => ['required', 'integer'],
            'status' => ['required', 'in:available,not_available'],
            'bio' => ['required'],
        ];

        return $rules;
    }
}
