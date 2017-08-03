<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    function module() {
        return $this->belongsTo('App\Module','module_id');
    }

    function supps() {
    	return $this->belongsToMany('App\User','supports','sub_id','support_id');
    }

    function ticketmod () {
    	return $this->hasMany('App\Ticket','tsub_id');
    }
}
