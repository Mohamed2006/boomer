<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $table = 'Posts';
    public function Comment(){
    	return $this->hasMany('App\Comment', 'ItemId');
    }
	public function PostContent(){
		return $this->hasMany('App\PostContent');
	} 
     public function User(){
    	return $this->belongsTo('App\User');
    }

}
