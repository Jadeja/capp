<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function posts()
    {
    	//this post by many or share by many . we are taking singlar table for table
    	return $this->morphedByMany('App\Post','taggable');
    }


    public function videos()
    {
    	//this post by many or share by many . we are taking singlar table for table
    	return $this->morphedByMany('App\Video','taggable');
    }
}
