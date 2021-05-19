<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function getImagePathAttribute(){
        return url('storage/app/public/blog/'.$this->photo);
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function getLocalSlugAttribute(){
        return $this->slug;
    }
}
