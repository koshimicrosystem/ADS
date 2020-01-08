<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    public function transection()
    {
        return $this->belongsTo('App\Transection');
    }
}
