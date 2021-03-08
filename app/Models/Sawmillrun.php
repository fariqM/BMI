<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sawmillrun extends Model
{
    use HasFactory;

    protected $fillable = ['sawmillstock_id', 'nop', 'status'];

    public function stocks(){
        return $this->hasMany(Stock::class);
    }

    public function sawmillstock(){
        return $this->belongsTo(Sawmillstock::class);
    }
}
