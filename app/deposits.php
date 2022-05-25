<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 

class deposits extends Model
{

    public function duser(){
    	return $this->belongsTo('App\users', 'user');
    }

    public function dplan(){
    	return $this->belongsTo('App\plans', 'plan');
    }
 
}
