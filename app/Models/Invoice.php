<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['reference', 'supplier_id', 'note'];

    public function raws(){
       return $this->hasMany(Raw::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
