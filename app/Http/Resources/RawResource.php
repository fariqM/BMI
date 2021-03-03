<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RawResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $diff = date_diff(date_create($this->created_at),date_create(now()));
        return [
            'id' => $this->id,
            'series' => $this->series,
            'type' => $this->structure_category->name,
            'type_id' => $this->structure_category->id,
            'size' => $this->size." ".$this->uom ,
            'nop' => $this->nop,
            'periode' => $diff->format("%r%a days"),
            'warehouse' => $this->warehouse->name,
            'warehouse_id' => $this->warehouse->id,
            'supplier' => $this->supplier->name,
            'supplier_id' => $this->supplier->id,
            'invoice' => $this->invoice->reference,
            'invoice_id' => $this->invoice->id,
            'link' =>'link',
        ];
    }
}
