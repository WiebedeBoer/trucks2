<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo('App\Models\ArchiveCategory','category');
    }

    public function regions()
    {
        return $this->hasMany('App\Models\Region','archive');
    }
}
