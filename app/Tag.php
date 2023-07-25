<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    function hobbies(){
        return $this->belongsToMany('App\Hobby');
    }

    function filteredHobbies(){
        return $this->belongsToMany('App\Hobby')
        ->wherePivot('tag_id', $this->id)
        ->orderBy('updated_at', 'DESC');
    }

    //
    protected $fillable = [
        'name', 'style',
    ];
}
