<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ustatus extends Model
{
	function user() {
		return $this->hasMany(User::class);
	}
}
