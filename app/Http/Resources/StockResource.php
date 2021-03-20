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
        $status = "";
        $confirm_status = "";

        if($this->status === NULL){
            $status = 'NOT SET';
        } else{
            $status = $this->status;
        }

        if($this->confirm_status === NULL){
            $confirm_status = 'NOT SET';
        } else{
            $confirm_status = $this->confirm_status;
        }



        return [
            'id' => $this->id,
            'name' => $this->name,
            'stockprofile' => $this->stockprofile,
            'tally' => $this->tally,
            'size' => $this->size,
            'height' => $this->height,
            'width' => $this->width,
            'length' => $this->length,
            'pcs' => $this->pcs,
            'status' =>  $status,
            'confirm_status' => $confirm_status,
            'nop' => $this->nop,
            'series' => $this->sawmillrun->sawmillstock->series,
            'structure_category' => $this->sawmillrun->sawmillstock->raw->structure_category->name,
            'type' => $this->type->name,
            'unit_measure' => $this->unit_measure->uom,
            'origin' => $this->origin,
            'warehouse' => $this->warehouse->name,
            '_showDetails' => false,
        ];
    }
}
