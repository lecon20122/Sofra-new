<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductsResource;

class RestaurantProductsResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'address' => $this->address,
            'phone'   => $this->phone,
            'delivery_fees' => $this->delivery_fees,
            'min_order' => $this->min_order,
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
