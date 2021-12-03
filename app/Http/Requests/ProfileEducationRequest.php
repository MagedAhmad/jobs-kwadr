<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEducationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'skill_id' => ['required', 'exists:skills,id'],
            'job_type_id' => ['required', 'exists:job_types,id'],
            'job_field_id' => ['required', 'exists:job_fields,id'],
            'training_type_id' => ['required'],
            'supported_before' => ['nullable'],
            'supporter_id' => ['nullable'],
            'certificate_name' => ['nullable'],
        ];
    }
}
