<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable =['series', 'tally', 'origin', 'warehouse_id', 'nop', 'unit', 'status', 'confirm_status', 'confirm_at'];

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
}