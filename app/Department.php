<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    function employs() {
    	return $this->belongsToMany('App\User','employees','dept_id','employee_id');
    }
}
