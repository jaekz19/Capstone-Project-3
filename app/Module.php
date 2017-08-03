<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    function submodule() {
		return $this->hasMany(Sub::class);
	}
}
