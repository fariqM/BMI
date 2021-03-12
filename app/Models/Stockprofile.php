<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockprofile extends Model
{
    use HasFactory;

    protected $fillable = ['size', 'length', 'width', 'height'];

    public function stocks(){
        return $this->hasMany(Stock::class);
    }
}
