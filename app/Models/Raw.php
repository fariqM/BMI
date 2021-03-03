<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raw extends Model
{
    use HasFactory;

    protected $fillable = ['series', 'structure_category_id', 'size', 'uom', 'nop', 'warehouse_id', 'supplier_id', 'invoice_id'];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }

    public function structure_category(){
        return $this->belongsTo(StructureCategory::class);
    }
}
