<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
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
            'title' => $this->name,
            'id' => $this->id,
            'shortname' => $this->shortname,
            'address' => $this->address,
            'owner' => $this->owner,
            'email' => $this->email,
            'website' => $this->website,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
        ];
    }
}
