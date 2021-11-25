<?php

namespace App\Http\Resources;

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
            "first_name" => $this->first_name,"father_name" => $this->father_name,"grandfather_name" => $this->grandfather_name,"family_name" => $this->family_name,"gender" => $this->gender,"id_number" => $this->id_number,"social_security_number" => $this->social_security_number,"social_security_number" => $this->social_security_number,"phone" => $this->phone,"email" => $this->email,"has_disability" => $this->has_disability,"has_driving_license" => $this->has_driving_license,
        ];
    }
}
