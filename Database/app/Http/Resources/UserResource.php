<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'userid' => $this->id,
            'username' => $this->username,
            'token' => $this->createToken('auth_token')->plainTextToken,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'postalcode' => $this->postalcode,
            'city' => $this->city,
            'address' => $this->address,
            'tel' => $this->tel
        ];
    }
}
