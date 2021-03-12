<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'stockprofile_id', 'tally', 'size', 'height', 'width', 'length','status','confirm_status', 'sawmillrun_id',  'type_id', 'unit_measure_id', 'origin', 'warehouse_id'];

    public function sawmillrun(){
        return $this->belongsTo(Sawmillrun::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function unit_measure(){
        return $this->belongsTo(UnitMeasure::class);
    }

    public function origin(){
        return $this->belongsTo(Warehouse::class, 'origin', 'id', 'origin');
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }

    public function stockprofile(){
        return $this->belongsTo(Stockprofile::class);
    }
}
