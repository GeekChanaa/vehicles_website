<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    //
    public function comments(){
      return $this->belongsTo('App\comment','comment_id');
    }

    public function reports(){
      return $this->hasMany('App\reported_reply','reply_id');
    }
}
