<?php

namespace App\Http\Requests\Frontend;

use App\Models\Candidate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Can;

class CandidateProfileBasicUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules= [
           'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'CV' => 'nullable|mimes:pdf,doc,docx|max:2048',
           'email' => 'required|email',
           'full_name' => 'required|string',
           'title' => 'nullable|string',
           'experience_level' => 'required|integer',
           'website' => 'nullable|active_url',
           'dob' => 'required|date',
        ];

        $candidate = Candidate::where('user_id', auth()->user()->id)->first();

        if(empty($candidate) || !$candidate?->image ){
            $rules['profile_picture'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        return $rules;
    }
}
