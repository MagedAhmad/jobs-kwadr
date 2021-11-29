<?php

namespace App\Http\Resources;

use App\Http\Resources\Countries\AreaResource;
use App\Http\Resources\Countries\CityResource;
use App\Http\Resources\Countries\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {

        if ($request->example_excel) {
            return [
                "first_name" => $this->first_name,"father_name" => $this->father_name,"grandfather_name" => $this->grandfather_name,"family_name" => $this->family_name,"gender" => $this->gender,"id_number" => $this->id_number,"social_security_number" => $this->social_security_number,"social_security_number" => $this->social_security_number,"phone" => $this->phone,"email" => $this->email,"has_disability" => $this->has_disability,"has_driving_license" => $this->has_driving_license,
            ];
        }

        return [
            'id' => $this->id,
            "first_name" => $this->first_name,
            "father_name" => $this->father_name,
            "grandfather_name" => $this->grandfather_name,
            "family_name" => $this->family_name,
            "gender" => $this->gender,
            "id_number" => $this->id_number,
            "social_security_number" => $this->social_security_number,
            "phone" => $this->phone,
            "email" => $this->email,
            "has_disability" => $this->has_disability,
            "has_driving_license" => $this->has_driving_license,
            "martial" => new MartialResource($this->martial),
            'country' => new CountryResource($this->country),
            'city' => new CityResource($this->city),
            'area' => new AreaResource($this),
            'job_type' => new JobTypeResource($this->job_type),
            'job_field' => new JobFieldResource($this->job_field),
            'skill' => new SkillResource($this->skill),
            'employer' => new EmployerResource($this->employer),
            'supporter' => new SupporterResource($this->supporter),
            'training_type' => new TrainingTypeResource($this->training_type)
        ];
    }
}
