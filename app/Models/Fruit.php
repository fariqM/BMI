<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    protected $guarded =[];
    // protected $fillable = ['name', 'varian', 'latin_name', 'origin', 'year_found'];
    use HasFactory;
}
