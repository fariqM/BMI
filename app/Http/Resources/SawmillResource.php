<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SawmillResource extends JsonResource
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
            'series' => $this->series,
            'nop' => $this->nop,
            'nop_virtual' => $this->nop_virtual,
            'structure_category' => $this->raw->structure_category->name,
            'periode' => datenow($this->raw->created_at),
        ];
    }
}
