<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
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
            'tally' => $this->tally,
            'size' => $this->size,
            'height' => $this->height,
            'width' => $this->width,
            'length' => $this->length,
            'nop' => $this->nop,
            'series' => $this->raw->series,
            'structure_category' => $this->raw->structure_category->name,
            'type' => $this->type->name,
            'unit_measure' => $this->unit_measure->uom,
            'origin' => $this->origin,
            'warehouse' => $this->warehouse->name,
        ];
    }
}
