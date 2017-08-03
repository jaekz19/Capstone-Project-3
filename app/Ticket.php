<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    function creator() {
    	return $this->belongsTo('App\User','creator_id');
    }

    function supporter() {
    	return $this->belongsTo('App\User', 'supp_id');
    }

    function tstat() {
        return $this->belongsTo('App\Tstatus','tstatus_id');
    }

    function tmod() {
    	return $this->belongsTo('App\Sub', 'tsub_id');
    }
}
