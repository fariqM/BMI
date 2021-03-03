<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends JsonResource
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
            'tally' => $this->tally,
            'origin' => $this->origin,
            'destination_id' => $this->warehouse_id,
            'destination_name' => $this->warehouse->name,
            'nop' => $this->nop,
            'unit' => $this->unit,
            'status' => $this->status,
            'confirm_status' => $this->confirm_status,
            'confirm_at' => $this->confirm_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
