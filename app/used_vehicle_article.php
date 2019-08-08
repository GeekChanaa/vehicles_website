<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class used_vehicle_article extends Model
{
  //Many to Many relationship with comments
  public function reports(){
    return $this->hasMany('App\report_uv','article_id');
  }
}
