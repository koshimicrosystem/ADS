<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Due extends Model
{
    use SoftDeletes;
    public function fee()
    {
        return $this->belongsTo('App\Fee');
    }
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    public function transection()
    {
        return $this->belongsTo('App\Transection');
    }
}
