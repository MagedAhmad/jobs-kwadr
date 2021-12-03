<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainProfileDataRequest extends FormRequest
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
            "first_name" => 'required',
            "father_name" => 'required',
            "grandfather_name" => 'required',
            "family_name" => 'required',
            "gender" => 'required',
            "id_number" => 'required',
            "social_security_number" => 'required',
            "phone" => 'required',
            "email" => 'required',
            "has_disability" => 'nullable',
            "has_driving_license" => 'nullable',
        ];
    }
}
