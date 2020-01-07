<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stdmaster extends Model
{
    use SoftDeletes;
    public function stds()
    {
        return $this->hasMany('App\Std');
    }
    public function fees()
    {
        return $this->belongsToMany('App\Fee');
    }
}
