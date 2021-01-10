<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public function trucks()
    {
        return $this->belongsTo('App\Models\Truck','truck');
    }
}
