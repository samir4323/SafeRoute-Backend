<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ["plate_number","model","status"];

    public function trips(){
        return $this->hasMany(Trip::class);
    }
}
