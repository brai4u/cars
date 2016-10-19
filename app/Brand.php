<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Car;
use App\Feature;
use App\Modelo;

class Brand extends Model
{
    public function cars(){
    	return $this->hasMany('App\Car');
    }

    public function features(){
    	return $this->hasMany('App\Feature');
    }

    public function modelos(){
    	return $this->hasMany('App\Modelo');
    }
}
