<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //relationship with posts
    public function posts(){
      return $this->belongsTo('App\post','post_id');
    }

    public function replies(){
      return $this->hasMany('App\reply','comment_id');
    }

    public function reports(){
      return $this->hasMany('App\reported_comment','comment_id');
    }
}
