<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SawmillrunResource extends JsonResource
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
            'nop' => $this->nop,
            'sawmillstock_id' => $this->sawmillstock_id,
            'series' => $this->sawmillstock->series,
            'structure_category' => $this->sawmillstock->raw->structure_category->name,
            'supplier' => $this->sawmillstock->raw->supplier,
            '_showDetails' => false,
            'status' => $this->status,
        ];
    }
}
