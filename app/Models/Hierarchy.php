<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hierarchy extends Model
{
    use HasFactory;

    public function uppers()
    {
        return $this->belongsTo('App\Models\Region','upper');
    }

    public function lowers()
    {
        return $this->belongsTo('App\Models\Region','lower');
    }
}
