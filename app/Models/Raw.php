<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raw extends Model
{
    use HasFactory;

    protected $fillable = ['series', 'structure_category_id', 'size', 'length', 'height', 'width' , 'uom', 'nop', 'unit', 'amount', 'status',  'invoice_id'];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

    public function sawmillstocks(){
        return $this->hasMany(Sawmillstock::class);
    }


    public function structure_category(){
        return $this->belongsTo(StructureCategory::class);
    }

    public function records(){
        return $this->hasMany(Record::class);
    }
}
