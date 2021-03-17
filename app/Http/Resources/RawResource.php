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
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'nop' => $this->nop,
            'amount' => $this->amount,
            'periode' => $diff->format("%r%a days"),
            'supplier' => $this->invoice->supplier->name,
            'supplier_id' => $this->invoice->supplier->id,
            'supplier_address' => $this->invoice->supplier->address,
            'supplier_alias' => $this->invoice->supplier->shortname,
            'supplier_email' => $this->invoice->supplier->email,
            'supplier_website' => $this->invoice->supplier->website,
            'supplier_phone' => $this->invoice->supplier->phone,
            'invoice' => $this->invoice->reference,
            'invoice_id' => $this->invoice_id,
            'link' =>'link',
            'invoice_date' => date_format($this->invoice->created_at, 'd-F-Y'),
        ];
    }
}
