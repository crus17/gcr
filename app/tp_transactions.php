<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tp_transactions extends Model
{

	protected $fillable=['user','plan','amount','type'];
 
}
