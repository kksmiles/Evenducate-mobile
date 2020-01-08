<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User', 'interest');
    }
    public function Event()
    {
        return $this->belongsTo('App\Event', 'interest');
    }
}
