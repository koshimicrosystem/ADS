<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function users()
    {
        return $this->morphedByMany('App\User', 'contactable');
    }
    public function guardians()
    {
        return $this->morphedByMany('App\User', 'contactable');
    }
}
