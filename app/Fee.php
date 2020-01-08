<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fee extends Model
{
    use SoftDeletes;
    public function stdmasters()
    {
        return $this->belongsToMany('App\Stdmaster');
    }
    public function dues()
    {
        return $this->hasToMany('App\Due');
    }
}
