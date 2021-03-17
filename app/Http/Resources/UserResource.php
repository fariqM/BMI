<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'address' => $this->address,
            'mobile' => $this->mobile,
            'active' => date_format($this->created_at, 'd-F-Y'),
            'role' => $this->getRoleNames()->first(),
            'permission' => $this->getPermissionNames()->first(),
        ];
    }
}
