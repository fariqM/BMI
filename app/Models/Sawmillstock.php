<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sawmillstock extends Model
{
    use HasFactory;

    protected $fillable = ['series', 'nop', 'nop_virtual', 'processed'];

    public function raw()
    {
        return $this->belongsTo(Raw::class, 'series', 'series');
    }

    public function record()
    {
        return $this->belongsTo(Record::class, 'series', 'series');
    }

    public function sawmillruns()
    {
        return $this->hasMany(Sawmillrun::class);
    }
}
