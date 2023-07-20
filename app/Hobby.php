<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    function user(){
        return $this->belongsTo('App\User');
    }

    function tags(){
        return $this->belongsToMany('App\Tag');
    }

    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'user_id'
    ];
}
