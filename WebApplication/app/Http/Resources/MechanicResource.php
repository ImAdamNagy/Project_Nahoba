<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;    

class MechanicResource extends JsonResource
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
            'id'=>$this->id,
            'introduction'=> $this->introduction,
            'country'=> $this->country,
            'postal_code'=> $this->postal_code,
            'city'=> $this->city,
            'address'=> $this->address,
            'profile_pic'=> $this->profile_pic,
            'profession'=> $this->profession,
            'user'=> new UserResource($this->User)
        ];
    }
}
