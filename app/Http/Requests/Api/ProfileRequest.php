<?php

namespace App\Http\Requests\Api;

use App\Models\User;
use App\Rules\PasswordRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Concerns\WithHashedPassword;

class ProfileRequest extends FormRequest
{
    use WithHashedPassword;

    /**
     * Determine if the supervisor is authorized to make this request.
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
            'first_name' => ['required'],
            'father_name' => ['required'],
            'grandfather_name' => ['required'],
            'family_name' => ['required'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'id_number' => ['required', 'numeric'],
            'social_security_number' => ['required'],
            'phone' => ['required', 'unique:profiles,phone'],
            'email' => ['required', 'email', 'unique:profiles,email'],
            'has_disability' => ['required'],
            'has_driving_license' => ['required'],
            'martial_id' => ['required', 'exists:martials,id'],
            'neighbour_name' => ['required'],
            'street' => ['required'],
            'postal_code' => ['required'],
            'additional_number' => ['nullable', 'numeric'],
            'building_no' => ['required'],
            'country_id' => ['required', 'exists:countries,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'area_id' => ['required', 'exists:areas,id'],
            'job_type_id' => ['required', 'exists:job_types,id'],
            'skill_id' => ['required', 'exists:skills,id'],
            'job_field_id' => ['required', 'exists:job_fields,id'],
            'employer_id' => ['required', 'exists:employers,id'],
            'supported_before' => ['nullable'],
            'supporter_id' => ['nullable', 'exists:supporters,id'],
            'first_goal' => ['required', 'exists:cities,id'],
            'second_goal' => ['required', 'exists:cities,id'],
            'third_goal' => ['required', 'exists:cities,id'],
            'training_type_id' => ['required', 'exists:training_types,id'],
            'certificate_name' => ['nullable'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('profiles.attributes');
    }
}
