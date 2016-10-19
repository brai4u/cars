<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public function cars(){
    	return $this->hasMany('App\Car');
    }

    public function modelos(){
    	return $this->hasMany('App\Modelo');
    }

    public function brands(){
    	return $this->hasMany('App\Brand');
    }
}
