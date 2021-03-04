<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'shortname', 'capacity', 'address'];


    public function users(){
        return $this->hasMany(User::class);
    }

    public function records(){
        return $this->hasMany(Record::class);
    }
}
