<?php

namespace App\Http\Resources;

use App\Models\Restaurant;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
           'restaurant' => RestaurantResource::collection($this->whenLoaded('restaurant')),
           'state' => $this->state,
           'address' => $this->address,
           'notes' => $this->notes,
           'cost' => $this->cost,
           'total' => $this->total,
           'delivery_fees' => $this->delivery_fees,
           'items' => $this->whenPivotLoaded('order_product' , function(){
               return $this->pivot;
           }),
       ];
    }
}
