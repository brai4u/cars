<?php

namespace App;

use App\Feature;
use App\Brand;
use App\Car;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{   
  /*  public function features(){
    	return $this->belongsToMany('App\Feature');
    }*/

    public function brand(){
    	return $this->belongsTo('App\Brand');
    }

    public function car(){
    	return $this->hasMany('App\Car');
    }
}
