<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructureCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'shortname'];

    public function raws(){
        return $this->hasMany(Raw::class);
    }
}
