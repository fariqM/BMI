<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sawmillstock extends Model
{
    use HasFactory;

    protected $fillable = ['series', 'raw_id', 'nop'];

    public function raw(){
        return $this->belongsTo(Raw::class);
    }
}
