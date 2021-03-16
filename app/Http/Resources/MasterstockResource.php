<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MasterstockResource extends JsonResource
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
            'stockprofile_id' => $this->stockprofile_id,
            'profile_wood' => $this->stockprofile,
            'tally' => $this->tally,
            'size' => $this->size,
            'height' => $this->height,
            'width' => $this->width,
            'length' => $this->length,
            'confirm_status' => $this->confirm_status,
            'status' => $this->status,
            'sawmillrun_id' => $this->sawmillrun_id,
            'sawmill' => $this->sawmill,
            'type_id' => $this->type_id,
            'type' => $this->type,
            'unit_measure_id' => $this->unit_measure_id,
            'unit_measure' => $this->unit_measure,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'origin' => $this->origin,
            'warehouse_id' => $this->warehouse_id,
            'warehouse' => $this->warehouse->name,
        ];
    }
}
