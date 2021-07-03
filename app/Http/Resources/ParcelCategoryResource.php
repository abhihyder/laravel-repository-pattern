<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParcelCategoryResource extends JsonResource
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
            'categoryId' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'weight' => $this->weight,
            'size' => $this->size,
        );
    }
}
