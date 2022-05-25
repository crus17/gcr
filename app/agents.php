<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agents extends Model
{

    public function duser(){
    	return $this->belongsTo('App\users', 'agent');
    }
 
}
