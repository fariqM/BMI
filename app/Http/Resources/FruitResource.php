<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FruitResource extends JsonResource
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
            'latin_name' => $this->latin_name,
            'varian' => $this->varian,
            'origin' => $this->origin,
            'year_found' => $this->year_found,
            'link' => route('fruits.show', $this->id),
        ];
    }
}
