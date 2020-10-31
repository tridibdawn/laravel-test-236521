<?php

namespace App\Http\Resources;

use App\Http\Resources\OrderDetailsResource;
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
            "order_id" => $this->orderNumber,
            "order_date" => $this->orderDate,
            "status" => $this->status,
            "order_details" => OrderDetailsResource::collection($this->orderDetails)
        ];
    }
}
