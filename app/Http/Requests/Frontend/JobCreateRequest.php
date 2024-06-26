<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class JobCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'category' => ['required', 'integer'],
            'vacancies' => ['required', 'max:255'],
            'deadline' => ['required', 'date'],
            'country' => ['nullable', 'integer'],
            'state' => ['nullable', 'integer'],
            'city' => ['nullable', 'integer'],
            'address' => ['nullable', 'max:255'],
            'salary_mode' => ['required', 'in:range,custom'],
            'min_salary' => ['required_if:salary_mode,range', 'nullable', 'numeric'],
            'max_salary' => ['required_if:salary_mode,range', 'nullable', 'numeric'],
            'custom_salary' => ['required_if:salary_mode,custom', 'nullable', 'string', 'max:255'],
            'salary_type' => ['required', 'integer'],
            'experience' => ['required', 'integer'],
            'education' => ['required', 'integer'],
            'job_type' => ['required', 'integer'],
            'job_role' => ['required', 'integer'],
            'tags' => ['required', 'array'],
            'benefits' => ['required'],
            'skills' => ['required', 'array'],
            'receive_application' => ['required', 'in:app,email,custom_url'],
            'description' => ['required', 'string'],
        ];
    }
}
