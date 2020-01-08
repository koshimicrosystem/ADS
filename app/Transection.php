<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    public function dues()
    {
        return $this->hasMany('App\Due');
    }
    public function transections()
    {
        return $this->hasMany('App\Transection');
    }
    public function advance()
    {
        return $this->hasMany('App\Advance');
    }
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
