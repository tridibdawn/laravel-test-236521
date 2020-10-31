<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
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
            "product" => product_name($this->productCode),
            "product_line" => product_line($this->productCode),
            "unit_price" => $this->priceEach,
            "qty" => $this->quantityOrdered,
            "line_total" => order_total($this->quantityOrdered, $this->priceEach)
        ];
    }
}
