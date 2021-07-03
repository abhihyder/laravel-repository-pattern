<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParcelChargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array(
            'parcelCategoryId' => $this->parcel_category_id,
            'from' => $this->from_id,
            'to' => $this->to_id,
            'amount' => $this->amount,
            'currency' => $this->currency
        );
    }
}








