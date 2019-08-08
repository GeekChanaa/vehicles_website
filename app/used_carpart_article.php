<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class used_carpart_article extends Model
{
  //Many to Many relationship with comments
  public function reports(){
    return $this->hasMany('App\report_ucp','article_id');
  }
}
