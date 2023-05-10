<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'seller'=> new UserResource($this->Seller),
            'product_name' => $this->product_name,
            'product_price' => $this->product_price,
            'type' => new TypeResource($this->Type),
            'car_type' => new CarTypeResource($this->CarType),
            'product_img' => $this->product_img,
            'product_description' =>$this->product_description,
            'product_location' => $this->product_location,
            'product_enable' => $this->product_enable
        ];
    }
}
