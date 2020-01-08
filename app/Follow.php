<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{

    public function Profile()
    {
        return $this->belongsTo('App\Profile', 'follow');
    }
    public function User()
    {
        return $this->belongsTo('App\User', 'follow');
    }
}
