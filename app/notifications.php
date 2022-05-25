<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
//@var array
protected $fillable=['user_id', 'message'];
}
