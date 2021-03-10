<?php

namespace App\Http\Resources;

use App\Models\Sawmillstock;
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
        $tgl = "ada";

        if ($this->confirm_at === NULL){
            $tgl = NULL;
        } else{
          $tgl =  datenow($this->confirm_at);
        }

        $cond = "";

        $sawmillstock = Sawmillstock::where('series', $this->series)->first();
        if($sawmillstock === null){
            $sawmillstock = ['id' => 'null gaes'];
        } else {
            $cond = "adaa";
        }

        $unit = "";

        if($this->unit === NULL){
            $unit = 'NULL';
        } else{
            $unit = $this->unit;
        }

        return [
            'id' => $this->id,
            'sawmillstock_id' => $sawmillstock,
            'series' => $this->series,
            'tally' => $this->tally,
            'origin' => $this->origin,
            'destination_id' => $this->warehouse_id,
            'destination_name' => $this->warehouse->name,
            'nop' => $this->nop,
            'unit' => $unit,
            'status' => $this->status,
            'confirm_status' => $this->confirm_status,
            'confirm_at' => $tgl,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
