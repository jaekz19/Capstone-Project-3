<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    function employs() {
    	return $this->belongsToMany('App\User','employees','dept_id','employee_id');
    }

    function ticketsrelated() {
    	return $this->hasManyThrough('App\Ticket','App\Employee','dept_id','creator_id','id');
    }
}
