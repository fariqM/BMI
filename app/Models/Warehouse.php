<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'shortname', 'capacity', 'address'];

    public function raws(){
       return $this->hasMany(Raw::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
