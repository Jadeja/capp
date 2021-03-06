<?php

namespace App;

use App\Task;
use App\Contact;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the tasks for the user.
    */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get all of the contacts for the user.
    */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    } 


    //to get all task of the user
    public function task()
    {
        return $this->hasOne('App\Task');
    }


    public function photos()
    {
        return $this->morphMany('App\Photo','imageable');
    }    


    public function getNameAttribute($name)
    {
        return strtoupper($name);
    }


    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtoupper($name);
    }

}
