<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'title' => $this->reference,
            'id' => $this->id,
            'note' => $this->note,
            'supplier_id' => $this->supplier->id,
            'supplier_name' => $this->supplier->name,
            'supplier_shortname' => $this->supplier->shortname,
        ];
    }
}
