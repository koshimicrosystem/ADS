<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guardian extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function contacts()
    {
        return $this->morphToMany('App\Contact', 'contactable');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }
}
