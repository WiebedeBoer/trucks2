<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo('App\Models\Category','category');
    }

    public function regions()
    {
        return $this->belongsTo('App\Models\Region','region');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\Photo','truck');
    }
}
