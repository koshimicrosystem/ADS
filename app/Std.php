<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Std extends Model
{
    use SoftDeletes;
    public function students()
    {
        return $this->hasMany('App\Student');
    }
    public function stdmaster()
    {
        return $this->belongsTo('App\Stdmaster');
    }
}
