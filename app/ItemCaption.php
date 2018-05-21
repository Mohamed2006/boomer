<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCaption extends Model
{
    //
       protected $table = 'ITemCapctions';
         protected $fillable = ['item_id', 'content', 'type', ];

      public function Item(){
    	return $this->belongsTo('App\Item');
    }
}
