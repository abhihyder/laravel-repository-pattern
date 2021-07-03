<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParcelStationResource extends JsonResource
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
            'storeId' => $this->id,
            'storeCode' => $this->store_code,
            'email' => $this->email,
            'contactNumber' => $this->contact_number,
            'address' => $this->address,
            'postalCode' => $this->postal_code,
            'cityName' => $this->city_name,
            'stateName' => $this->state_name,
            'countryName' => $this->country_name,
            'distance' => $this->distance,
        );
    }
}

