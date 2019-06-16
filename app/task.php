<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    //Relationship with the person in charge of the task
    public function User_inchargeof(){
        return $this->belongsTo('App\User','in_charge_of_id');
    }
}
