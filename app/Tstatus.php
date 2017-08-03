<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tstatus extends Model
{
    function ticket() {
		return $this->hasMany(Ticket::class);
	}
}
