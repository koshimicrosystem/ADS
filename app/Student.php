<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function std()
    {
        return $this->belongsTo('App\Std');
    }
    public function guardians()
    {
        return $this->belongsToMany('App\Guardian');
    }
    public function dues()
    {
        return $this->hasMany('App\Due');
    }
    public function advances()
    {
        return $this->hasMany('App\Advance');
    }
}
