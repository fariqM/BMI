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

    public function raw(){
        return $this->belongsTo(Raw::class, 'series', 'series');
    }

    public function sawmillstocks(){
        return $this->hasMany(Sawmillstock::class, 'series', 'series');
    }
}
