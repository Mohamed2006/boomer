<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostContent extends Model
{
	protected $table = 'PostContents';
    //
     public function Post(){

    	return $this->belongsTo('App\Post');
    }
}
