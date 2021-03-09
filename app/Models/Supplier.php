<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'shortname', 'address', 'owner', 'email', 'website', 'phone', 'mobile'];
    

    public function invoices(){
        return $this->hasMany(Supplier::class);
    }
}
