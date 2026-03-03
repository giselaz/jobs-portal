<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Propaganistas\LaravelPhone\Rules\Phone;


class JobCandidateRequest extends FormRequest
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
            'phone' => ['nullable',new Phone()],
            'location' => 'nullable|string|max:255',
            'job_title' => 'required|string|max:255',
            'years_of_experience' => 'nullable|integer|min:0',
            'expected_salary' => 'nullable|numeric|min:0',
            'salary_currency' => 'nullable|string|max:3',
            'bio' => 'nullable|string',
            'cv_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ];
    }
}
