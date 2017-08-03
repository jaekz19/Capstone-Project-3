<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','ustatus_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function status() {
        return $this->belongsTo('App\Ustatus','ustatus_id');
    }

    function departs() {
        return $this->belongsToMany('App\Department','employees','employee_id','dept_id');
    }

    function mods() {
        return $this->belongsToMany('App\Sub','supports','support_id','sub_id');
    }

    function ticket() {
        return $this->hasMany('App\Ticket', 'creator_id');
    }

    function sticket() {
        return $this->hasMany('App\Ticket', 'supp_id');
    }
}
