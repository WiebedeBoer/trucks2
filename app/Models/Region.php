<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo('App\Models\RegionCategory','category');
    }

    public function archives()
    {
        return $this->belongsTo('App\Models\Archive','archive');
    }

    public function trucks()
    {
        return $this->hasMany('App\Models\Truck','region');
    }

    public function uppers()
    {
        return $this->hasMany('App\Models\Region','upper');
    }

    public function lowers()
    {
        return $this->hasMany('App\Models\Region','lower');
    }
}
