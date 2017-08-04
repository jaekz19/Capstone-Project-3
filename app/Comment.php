<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    function ticketassign() {
    	return $this->belongsTo('App\Ticket', 'ticket_id');
    }

    function commentor() {
    	return $this->belongsTo('App\User', 'commentor_id');
    }
}
