<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class new_vehicle_article extends Model
{
  //Many to Many relationship with comments
  public function reports(){
    return $this->hasMany('App\report_nv');
  }
}
