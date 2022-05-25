<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function tuser(){
    	return $this->belongsTo('App\Admin', 'designation');
    }

}
