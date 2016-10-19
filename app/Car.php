<?php

namespace App;

use App\Modelo;
use App\Car;
use App\Feature;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
	public function brand(){
		return $this->belongsTo('App\Brand');
	}

    public function features(){
    	return $this->belongsToMany('App\Feature');
    }

    public function modelo(){
    	return $this->belongsTo('App\Modelo');
    }



}
