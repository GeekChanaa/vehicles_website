<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class new_carpart_article extends Model
{
  //Many to Many relationship with comments
  public function reports(){
    return $this->hasMany('App\report_ncp','article_id');
  }
}
