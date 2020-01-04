<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
