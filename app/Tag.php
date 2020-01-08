<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_tag');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tag');
    }
}
