<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{

  /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'activated_at','entered_at','last_growth'];

    public function gh(){
    	return $this->hasMany('App\gh', 'donation_from');
    }

    public function ruser(){
    	return $this->hasMany('App\gh', 'donation_to');
    }

    public function dp(){
    	return $this->hasMany('App\deposits', 'user');
    }

    public function wd(){
    	return $this->hasMany('App\withdrawals', 'user');
    }
    public function tuser(){
    	return $this->belongsTo('App\Admin', 'assign_to');
    }
    public function dplan(){
    	return $this->belongsTo('App\plans', 'plan');
    }
	protected $fillable=['name','dob','l_name','address','phone_number'];
}
