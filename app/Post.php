<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $dir = '/name/';
	protected $fillable = ['title','path','content'];
    public function photos()
    {
    	return $this->morphMany('App\Photo','imageable');
    }


    public function tags()
    {
    	return $this->morphToMany('App\Tag','taggable');
    }


    public static function scopeLatest($query)
    {
       return $query->orderBy('id','asc')->get();
    }

    public function getPathAttribute($value)
    {
        return $this->dir.$value;
    }
}
