<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $guarded = [];
    public function contacts()
    {
        return $this->morphToMany('App\Contact', 'contactable');
    }
}
