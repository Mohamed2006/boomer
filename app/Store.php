<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    public function Item(){
    	return $this->hasMany('App\Item');
    }
     public function User(){
    	return $this->belongsTo('App\User');
    }
}
