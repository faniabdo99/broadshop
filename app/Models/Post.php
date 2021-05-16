<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['photo','title','slug','body','description','views','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function getLocalSlugAttribute(){
        return $this->slug;
    }
}
