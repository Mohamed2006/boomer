<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'Items';
    public function Store(){
    	return $this->belongsTo('App\Store');
    }
    public function ItemCaption(){
    	return $this->hasMany('App\ItemCaption');
    }
}
