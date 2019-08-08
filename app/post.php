<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //Many to Many relationship with comments
    public function comments(){
      return $this->hasMany('App\comment');
    }

    public function reports(){
      return $this->hasMany('App\reported_post','post_id');
    }
}
